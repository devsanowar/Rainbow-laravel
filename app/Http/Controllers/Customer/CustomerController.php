<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard(){
        return view('website.layouts.auth-customer.dashboard.dashboard');
    }
}
