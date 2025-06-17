<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function register()
    {
        return view('website.layouts.auth-customer.customer-register');
    }

    public function store(CustomerStoreRequest $request)
    {

        $user = User::create([
            'cus_username' => $request->cus_username,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email ?? 'guest_' . time() . rand(100, 999) . '@example.com',
            'system_admin' => User::ROLE_CUSTOMER,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user); // Auto login

        Toastr::success('Welcome! Your account has been created.');
        return redirect()->back(); // Or wherever your dashboard is
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
