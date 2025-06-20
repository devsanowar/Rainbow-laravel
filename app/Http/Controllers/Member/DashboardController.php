<?php

namespace App\Http\Controllers\Member;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $cartContents = session()->get('cart', []);

        // ✅ Total amount calculate করো
        $totalAmount = array_sum(
            array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cartContents),
        );

        // ✅ অন্যান্য পণ্য লোড
        $products = Product::where('is_active', 1)
            ->latest()
            ->limit(8)
            ->get(['id', 'product_name', 'product_slug', 'regular_price', 'points', 'discount_price', 'discount_type', 'thumbnail']);

        // ✅ View return with totalAmount
        return view('website.layouts.auth-member.dashboard', compact('products', 'cartContents', 'totalAmount'))->render();
    }

    public function loadProducts(Request $request)
    {
        $products = Product::latest()->paginate(7);

        if ($request->ajax()) {
            return view('website.layouts.auth-member.dashboard.pages.pertial.product-pagination', compact('products'))->render();
        }

        return view('website.layouts.auth-member.dashboard', compact('products'));
    }
}
