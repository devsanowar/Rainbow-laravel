<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PointSaleController extends Controller
{
    public function index(){

    }

    public function pointSaleForm(){
        return view('admin.layouts.pages.point-sale.point_sale');
    }
}
