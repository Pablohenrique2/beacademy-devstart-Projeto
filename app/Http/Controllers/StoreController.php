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
    public function create()
    {
        return view('products-store.create');
    }
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->photo = $request->photo;
        $products->category_id = $request->category_id;
        $products->quantity = $request->quantity;

        $products->save();
        return redirect('/');
    }
}