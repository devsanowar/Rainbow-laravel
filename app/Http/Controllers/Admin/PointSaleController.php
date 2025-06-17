<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\PointSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PointsaleStoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class PointSaleController extends Controller
{
    public function index()
    {
        $pointSales = PointSale::with(['user', 'admin'])->latest()->get();
        $users = User::where('system_admin', 'Member')
            ->select(['id', 'name'])
            ->get();
        return view('admin.layouts.pages.point-sale.index', compact('users', 'pointSales'));
    }


    public function store(PointsaleStoreRequest $request)
    {
        // ✅ Create point sale
        $pointSale = PointSale::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'points' => $request->points,
            'admin_id' => Auth::id(),
        ]);

        // ✅ Increment user's point
        User::where('id', $request->user_id)->increment('point', $request->points);

        // ✅ Redirect with success message
        Toastr::success('Point Sale Successfully Done.');
        return redirect()->back();
    }
}
