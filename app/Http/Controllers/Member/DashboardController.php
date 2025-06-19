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

        $products = Product::where('is_active', 1)
            ->latest()
            ->limit(8)
            ->get(['id', 'product_name', 'product_slug', 'regular_price', 'points', 'discount_price', 'discount_type', 'thumbnail']);

        return view('website.layouts.auth-member.dashboard', compact('products', 'cartContents'));
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
