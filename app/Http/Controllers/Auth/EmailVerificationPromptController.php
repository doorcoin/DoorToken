<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        // print_r($request->user()->hasVerifiedEmail() ? 1: 0);
        // exit;
        //$request->user()->sendEmailVerificationNotification();
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();
        return view('auth.verify-email');

        // return $request->user()->hasVerifiedEmail()
        //             ? redirect()->intended(RouteServiceProvider::HOME)
        //             : view('auth.verify-email');
    }
}
