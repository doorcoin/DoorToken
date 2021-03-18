<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use LengthException;

class VerifyController extends Controller
{
    public function view_user(Request $request) {
        //
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'admin_verify_user',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'users' => User::where('is_verified', '=', false)->get(),
                ]
            );
        }
    }

    public function verify_user_detail(Request $request, $id) {
        // ToDO:
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            return view(
                'admin_verify_user_detail',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'documents' => User::find($id)->documents,
                ]
            );
        }
    }

    public function verify_user(Request $request, $id) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            if ($request->input('verify') == "true") {
                $doc = UserDocument::find($id);
                $doc->status = true;
                $doc->save();

                $user_docs = $doc->user->documents;
                $type_list = [];
                $status = true;
                foreach ($user_docs as $user_doc) {
                    if ($user_doc->status != true) {
                        $status = false;
                    } else {
                        if (!in_array($user_doc->type, $type_list)) {
                            array_push($type_list, $user_doc->type);
                        }
                    }
                }

                $compare_type = ["Drivers License Front", "Drivers License Back", "Me Holding Drivers License"];
                if ($status == true && count(array_diff($compare_type, $type_list)) == 0) {
                    $user = $doc->user;
                    $user->is_verified = true;
                    $user->save();
                }

                return redirect()->back();
            }
        }
    }

    public function view_property(Request $request) {
        //
        //
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{
            $properties = Property::where('status', '=', false)->get();
            foreach($properties as $property) {
                $property->user = Property::find($property->id)->user_map->user;
            }
            return view(
                'admin_verify_property',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'properties' => $properties,
                ]
            );
        }
    }

    public function view_property_detail(Request $request, $id) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            return view(
                'admin_verify_property_detail',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'property' => Property::find($id),
                ]
            );
        }
    }

    public function verify_property(Request $request, $id) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            if ($request->input('verify') == "true") {
                $property = Property::find($id);
                $property->status = true;
                $property->save();

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
