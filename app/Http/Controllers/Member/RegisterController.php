<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return $request->all();
        User::create([
            'sponsor_username' => $request->sponsor_username,
            'name' => $request->name,
            'authentication_type' => $request->authentication_type,
            'authentication_number' => $request->authentication_number,
            'mobile_number' => $request->mobile_number,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,
            'position' => $request->position,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function getUpazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->select('id', 'upazila_name')->get();

        return response()->json($upazilas);
    }
}
