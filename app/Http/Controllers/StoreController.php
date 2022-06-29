<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $products = Product::all();
        return view('home', ['products' => $products], $data);
    }
    public function products(Request $request)
    {
        $data = [];
        $search = request('search');
        if ($search) {
            $products = Product::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $products = Product::all();
        }
        return view('products-store.products', ['products' => $products, 'search' => $search]);
    }
    public function create(Request $request)
    {
        $data = [];

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
    public function show($id)
    {

        $products = Product::findOrfail($id);
        return view('products-store.show', ['products' => $products]);
    }

    public function category(Request $request)
    {
        $data = [];
        $categories = Category::all();
        $product = Product::limit(4)->get();
        $data['listproducts'] = $product;
        $data['listcategories'] = $categories;
        return view('categories.categories', $data);
    }
}