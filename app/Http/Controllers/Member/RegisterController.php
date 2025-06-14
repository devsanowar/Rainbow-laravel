<?php

namespace App\Http\Controllers\Member;

use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(){
        $divisions = Division::all();
        return view('website.layouts.auth-member.register', compact('divisions'));
    }


    public function getUpazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->select('id', 'upazila_name')->get();

        return response()->json($upazilas);
    }

}
