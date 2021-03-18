<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\UserRole;

class LogController extends Controller
{
    //
    public function allTransactions(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'wallet',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

    public function deposit_withdraw(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'wallet',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
}
