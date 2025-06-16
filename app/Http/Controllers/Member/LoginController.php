<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemberloginRequest;
use Intervention\Image\Colors\Rgb\Channels\Red;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            if(Auth::user()->system_admin === 'Member'){
                Toastr::info('You are already logged in.');
                return redirect()->route('member.dashboard');
            }
        }
        return view('website.layouts.auth-member.login');
    }

    public function login(MemberloginRequest $request)
    {
        $credentials = $request->only('sponsor_username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->system_admin === 'Member') {
                return redirect()->intended(route('member.dashboard'));
            } else {
                Auth::logout();
                return redirect()->route('member.loginForm')->with('error', 'You are not authorized.');
            }
        }

        return back()->with('error', 'Invalid phone or password!!');
    }

    public function loginout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('member.loginForm');
    }
}
