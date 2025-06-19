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
        $pointSales = PointSale::with(['user', 'admin'])
            ->latest()
            ->get();
        $users = User::where('system_admin', 'Member')
            ->select(['id', 'name', 'member_username'])
            ->get();
        return view('admin.layouts.pages.point-sale.index', compact('users', 'pointSales'));
    }

    // public function store(PointsaleStoreRequest $request)
    // {
    //     // ✅ Create point sale
    //     $pointSale = PointSale::create([
    //         'user_id' => $request->user_id,
    //         'amount' => $request->amount,
    //         'points' => $request->points,
    //         'admin_id' => Auth::id(),
    //     ]);

    //     // ✅ Increment user's point
    //     User::where('id', $request->user_id)->increment('point', $request->points);

    //     // ✅ Redirect with success message
    //     Toastr::success('Point Sale Successfully Done.');
    //     return redirect()->back();
    // }

    public function store(PointsaleStoreRequest $request)
    {
        $pointSale = PointSale::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'points' => $request->points,
            'admin_id' => Auth::id(),
        ]);

        // Increment user's point
        User::where('id', $request->user_id)->increment('point', $request->points);

        return response()->json([
            'success' => true,
            'message' => 'Point Sale Successfully Done.',
            'id' => $pointSale->id,
            'user_name' => $pointSale->user->name ?? 'N/A',
            'member_username' => $pointSale->user->member_username ?? 'N/A',
            'amount' => number_format($pointSale->amount, 2),
            'points' => $pointSale->points,
            'admin_name' => $pointSale->admin->name ?? 'System',
            'created_at' => $pointSale->created_at->format('d M Y'),
            'index' => PointSale::count(), // 👈 নতুন রো-এর সিরিয়াল
        ]);
    }

    public function update(Request $request)
    {
        $sale = PointSale::findOrFail($request->sale_id);
        $sale->user_id = $request->user_id;
        $sale->amount = $request->amount;
        $sale->points = $request->points;
        $sale->save();

        // নতুন করে index বের করতে চাইলে - শুধু সেক্ষেত্রে যেখানে paginate নাই
        $index = PointSale::orderBy('id')->pluck('id')->search($sale->id) + 1;

        return response()->json([
            'id' => $sale->id,
            'user_id' => $sale->user_id,
            'user_name' => $sale->user->name,
            'member_username' => $sale->user->member_username ?? 'N/A',
            'amount' => $sale->amount,
            'points' => $sale->points,
            'admin_name' => $sale->admin->name ?? 'System',
            'created_at' => $sale->created_at->format('d M Y'),
            'index' => $index,
        ]);
    }

    public function destroy($id)
    {
        $pointSale = PointSale::findOrFail($id);
        $pointSale->delete();

        return response()->json([
            'message' => 'Point Sale deleted successfully.',
        ]);
    }
}
