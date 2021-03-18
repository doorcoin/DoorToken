<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\UserRole;

class WalletController extends Controller
{
    //
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'my_wallet',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
    public function add(Request $request)
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

    public function main(Request $request)
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

    public function deposit(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'wallet_deposit',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

    public function withdraw(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'wallet_withdraw',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

    public function transactions(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'wallet_transaction',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
}
