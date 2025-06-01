<?php

namespace App\Http\Controllers\Dealer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDealerRequest;

class RegisterController extends Controller
{
    public function register(){
        return view('dealer-auth.dealer-register');
    }

    public function store(StoreDealerRequest $request){
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
}
