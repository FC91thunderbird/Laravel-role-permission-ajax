<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = session('cart', []);

        $grandTotal = 0;

        foreach ($cart as $item) {
            $grandTotal += $item['quantity'] * $item['product']->price;
        }

        return view('user.cart.index', compact('cart', 'grandTotal'));
    }
    
    public function add(Product $product) {
        $cart = session('cart', []);
        
        if (isset($cart[$product->id])) {
            // Product is already in the cart, so increment the quantity
            $cart[$product->id]['quantity'] += 1;
        } else {
            // Product is not in the cart, add it to the cart
            $cart[$product->id] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        // $cart[$product->id] = [
        //     'product' => $product,
        //     'quantity' => $cart[$product->id]['quantity'] + 1
        // ];
    
        session(['cart' => $cart]);
    
        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }
    
    public function remove(Product $product) {
        $cart = session('cart', []);
    
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }
    
        session(['cart' => $cart]);
    
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }
}
