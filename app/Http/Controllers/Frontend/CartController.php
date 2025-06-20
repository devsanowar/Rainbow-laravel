<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function cartPage()
    {
        $cartContents = session()->get('cart', []);

        $totalAmount = 0;
        foreach ($cartContents as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        return view('website.layouts.pages.cart.cart_page', compact('cartContents', 'totalAmount'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $qty = $request->order_qty ?? 1;

        // Determine final price based on discount
        $final_price = $product->regular_price;

        if ($product->discount_price > 0) {
            if ($product->discount_type === 'percent') {
                $final_price = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
            } elseif ($product->discount_type === 'flat') {
                $final_price = $product->regular_price - $product->discount_price;
            }
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->product_name,
                'points' => $product->points,
                'price' => $final_price,
                'quantity' => $qty,
                'thumbnail' => $product->thumbnail,
                'regular_price' => $product->regular_price,
                'discount_price' => $product->discount_price,
                'discount_type' => $product->discount_type,
            ];
        }

        session()->put('cart', $cart);

        $itemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'message' => 'Product added to cart',
            'cart_count' => count($cart),
            'itemCount' => $itemCount,
            'new_item' => $cart[$product->id], // 👍 send item for JS to append
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->product_id;
        $action = $request->action;

        if (isset($cart[$productId])) {
            // Quantity Update Logic
            if ($action === 'increase') {
                $cart[$productId]['quantity'] += 1;
            } elseif ($action === 'decrease' && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity'] -= 1;
            }

            // Save updated cart to session
            session()->put('cart', $cart);

            // Calculate updated values
            $quantity = $cart[$productId]['quantity'];
            $unitPrice = $cart[$productId]['price'];
            $unitPoints = $cart[$productId]['points'] ?? 0;

            $itemTotal = $unitPrice * $quantity;
            $itemPointsTotal = $unitPoints * $quantity;

            $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
            $itemCount = array_sum(array_column($cart, 'quantity'));

            return response()->json([
                'success' => true,
                'quantity' => $quantity,
                'subtotal' => number_format($itemTotal, 2), // for per product row display
                'subtotalPoints' => number_format($itemPointsTotal, 2),
                'totalAmount' => number_format($totalAmount, 2),
                'itemCount' => $itemCount,
                'itemTotal' => number_format($itemTotal, 2), // same as subtotal
            ]);
        }

        // Product not found in cart
        return response()->json([
            'success' => false,
            'message' => 'Product not found in cart.',
        ]);
    }

    public function removeFromCart(Request $request)
{
    $id = $request->id;
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);

        session()->put('cart', $cart);

        // Recalculate totalAmount and itemCount after removing
        $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        $itemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'message' => 'Product removed from cart successfully!',
            'totalAmount' => number_format($totalAmount, 2),
            'itemCount' => $itemCount,
        ]);
    }

    return response()->json(['message' => 'Product not found in cart!'], 404);
}

}
