<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\CustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // show the admin Vuejs Page
        $customer_requests = CustomerRequest::all();
        return inertia('Admin/index', [
            'customer_requests' => $customer_requests,
            'admin' => Auth::guard('admin')->user(),
        ]);
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
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
    }

    /**
     * Show the admin form to login
     */
    public function login()
    {
        return inertia('Admin/login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.login.show'));
    }

    /**
     * Validate and authenticate the supplied credentials
     */
    public function validateLogin(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email', 'password' => 'required']);

        if(Auth::guard('admin')->attempt($validated)) {
            Auth::guard('admin')->login(Administrator::firstWhere('email', $request->email));

            return redirect(route('admin.index'));
        }
    }
}
