<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            if(Auth::user()->system_admin === 'Customer'){
                Toastr::info('You are already logged in.');
                return redirect()->route('customer.dashboard');
            }
        }
        return view('website.layouts.auth-customer.customer-login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('cus_username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->system_admin === 'Customer') {
                return redirect()->intended(route('customer.dashboard'));
            } else {
                Auth::logout();
                return redirect()->route('customer.loginForm')->with('error', 'You are not authorized.');
            }
        }

        return back()->with('error', 'Invalid phone or password!!');
    }
}
