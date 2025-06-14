<?php

namespace App\Http\Controllers\Member;

use App\Models\Union;
use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }

    public function getUpazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilas);
    }

    public function getUnions($upazila_id)
    {
        $unions = Union::where('upazila_id', $upazila_id)->get();
        return response()->json($unions);
    }
}
