<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\District;
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

    public function register(Request $request)
    {


        // do {
        //     $referrerId = random_int(100000, 999999);
        // } while (User::where('referrer_id', $referrerId)->exists());

        try {

            User::create([
                'system_admin' => User::ROLE_MEMBER,
                'sponsor_username' => $request->sponsor_username,
                // 'referrer_id' => $referrerId,  // No need at this moment
                'name' => $request->name,
                'salutation' => $request->salutation,
                'member_username' => $request->member_username,
                'authentication_type' => $request->authentication_type,
                'authentication_number' => $request->authentication_number,
                'phone' => $request->phone,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'upazila_id' => $request->upazila_id,
                'union_id' => $request->union_id,
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
