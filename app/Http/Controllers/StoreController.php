<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    public function products()
    {
        return view('products');
    }
}