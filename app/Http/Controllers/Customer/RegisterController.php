<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            Toastr::info('You are already logged in.');
            return redirect()->route('customer.dashboard');
        }
        return view('customer-auth.customer-login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            Toastr::success('Successfully logged in.');
            return redirect()->route('customer.dashboard');
        }

        return back()->with('error', 'Invalid phone or password!!');
    }

    public function register()
    {
        return view('customer-auth.customer-register');
    }

    public function store(CustomerStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email ?? 'guest_' . time() . rand(100, 999) . '@example.com',
            'system_admin' => 'Customer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Auto login

        Toastr::success('Welcome! Your account has been created.');
        return redirect()->route('customer.dashboard'); // Or wherever your dashboard is
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Toastr::success('Successfully logged out.');
        return redirect()->route('customer.login'); // আপনার লগইন রুট
    }


}
