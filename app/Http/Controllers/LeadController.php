<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\UserRole;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'my_lead',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
    public function settings(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'lead_set',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

}
