<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MembersStoreRequest;

class RegisterController extends Controller
{
    public function registerForm()
    {
        $divisions = Division::all();
        return view('website.layouts.auth-member.register', compact('divisions'));
    }

    public function register(MembersStoreRequest $request)
    {
        try {
            User::create([
                'system_admin' => User::ROLE_MEMBER,
                'sponsor_username' => $request->sponsor_username,
                'name' => $request->name,
                'authentication_type' => $request->authentication_type,
                'authentication_number' => $request->authentication_number,
                'mobile_number' => $request->mobile_number,
                'division' => $request->division_id,
                'district' => $request->district_id,
                'upazila' => $request->upazila_id,
                'union' => $request->union_id,
                'position' => $request->position,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Toastr::success('Member registered successfully');
            return redirect()->route('member.loginForm');
        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            Toastr::error('Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function getUpazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->select('id', 'upazila_name')->get();

        return response()->json($upazilas);
    }
}
