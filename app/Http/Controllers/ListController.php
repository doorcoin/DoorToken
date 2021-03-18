<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use App\Models\UserRole;
use App\Models\Lists;
use App\Models\UserListMap;

class ListController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            $lists = $request->user()->list_maps;
            // \Debugbar::info($lists->count());
            foreach ($lists as $list) {
                $list->item = Lists::find($list->list_id);
            }

            return view(
                'my_list',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'lists' => $lists,
                ]
            );
        }
    }
    public function add2list(Request $request)
    {
        if (!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            $lists = Lists::all();
            foreach ($lists as $list) {
                $list->is_subscribed = UserListMap::where([
                    ['user_id', '=', $request->user()->id],
                    ['list_id', '=', $list->id]
                ])->first() ? true : false;
            }

            return view(
                'list_add',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'lists' => $lists,
                ]
            );
        }
    }

    public function subscribe(Request $request, $id) {
        if (!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            if (UserListMap::where([
                ['user_id', '=', $request->user()->id],
                ['list_id', '=', $id]
            ])->first()) {
                UserListMap::where([
                    ['user_id', '=', $request->user()->id],
                    ['list_id', '=', $id]
                ])->first()->delete();
            } else {
                $map = new UserListMap();
                $map->user_id = $request->user()->id;
                $map->list_id = $id;
                $map->save();
            }
            return redirect()->back();
        }
    }
}
