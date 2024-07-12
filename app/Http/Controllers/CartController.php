<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        return Inertia::render('CartPage');
    }

    public function add(Request $request)
    {
        // Validate the request to ensure productId is provided
        $request->validate([
            'productId' => 'required|exists:products,id'
        ]);

        $user = auth()->user();
        // Get the user's cart or create a new one if it doesn't exist
        $cart = $user->cart ?: Cart::create(['user_id' => $user->id]);

        // Add the product to the cart
        $cartItem = $cart->items()->create([
            'product_id' => $request->input('productId'),
            'quantity' => $request->input('quantity', 1) // Default to 1 if quantity not provided
        ]);

        return response()->json(['success' => true, 'cartItem' => $cartItem->load('product')]);
    }

    public function remove(Request $request)
{
    // Validate the request to ensure productId is provided
    $request->validate([
        'productId' => 'required|exists:products,id'
    ]);

    $user = auth()->user();
    $cart = $user->cart;

    if ($cart) {
        $cartItem = $cart->items()->where('product_id', $request->productId)->first();

        if ($cartItem) {
            $cartItem->delete();
            \Log::info('Item removed successfully', ['product_id' => $request->productId]);
            return response()->json(['success' => true, 'productId' => $request->productId]);
        } else {
            \Log::warning('Item not found in cart', ['product_id' => $request->productId]);
            return response()->json(['success' => false, 'message' => 'Item not found in cart']);
        }
    } else {
        \Log::warning('Cart not found for user', ['user_id' => $user->id]);
        return response()->json(['success' => false, 'message' => 'Cart not found']);
    }
}
}
