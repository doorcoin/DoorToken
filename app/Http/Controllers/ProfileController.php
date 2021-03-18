<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'profile',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'user' => $request->user()
                ]
            );
        }
    }

    public function update(Request $request) {
        if (!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            $request->validate([
                'fname' => 'required|string|max:45',
                'lname' => 'required|string|max:45',
                'email' => ['required', Rule::unique('users')->ignore($request->user())],
                'phone' => 'nullable|numeric',
                'address1' => 'nullable|string|max:45',
                'address2' => 'nullable|string|max:45',
                'city' => 'nullable|string|max:45',
                'state' => 'nullable|string|max:45',
                'zip' => 'nullable|string|max:45',
                'default_zip' => 'nullable|string|max:45',
            ]);


            $user = $request->user();
            $user->update([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address1' => $request->input('address1'),
                'address2' => $request->input('address2'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zip' => $request->input('zip'),
                'default_zip' => $request->input('default_zip'),
            ]);

            return redirect()->back()->withInput();
        }
    }
}
