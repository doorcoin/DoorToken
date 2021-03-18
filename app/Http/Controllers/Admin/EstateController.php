<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EstateController extends Controller
{

    public function view_property(Request $request) {
        //
        //
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'admin_property',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

    public function view_lists(Request $request) {
        //
        //
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'admin_lists',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }

    public function view_leads(Request $request) {
        //
        //
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'admin_leads',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                ]
            );
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
