<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart($idproduct = null)
    {
        $product = Product::find($idproduct);

        if ($product) {
            $cart = session('cart', []);
            array_push($cart, $product);
            session(['cart' => $cart]);
        }

        return redirect()->route('home');
    }
    public function viewCart()
    {
        $cart = session('cart', []);
        $data = ['cart' => $cart];
        return view('cart.cart', $data);
    }
    public function deleteCart($indice)
    {
        $cart = session('cart', []);
        if (isset($cart[$indice])) {
            unset($cart[$indice]);
        }
        session(['cart' => $cart]);
        return redirect('/carrinho');
    }
}