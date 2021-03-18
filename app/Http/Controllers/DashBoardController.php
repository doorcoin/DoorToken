<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\UserRole;

class DashBoardController extends Controller
{
    //
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'dashboard',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
}
