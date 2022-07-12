<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::limit(8)->get();
        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();



        return view('home', ['products' => $products], compact('order'));
    }
    public function products(Request $request, $idcategory = null)
    {

        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();
        $data = [];
        $categories = Category::all();
        $queryproduct = Product::limit(12);

        if ($idcategory != 0) {
            $queryproduct->where("category_id", $idcategory);
        }


        $product = $queryproduct->paginate(12);
        $data['products'] = $product;
        $data['listcategories'] = $categories;
        $data['idcategory'] = $idcategory;


        return view('products-store.products', $data, compact('order'));
    }
    public function products_search(Request $request)
    {
        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();
        $search = request('search');

        $products = Product::where([
            ['name', 'like', '%' . $search . '%']
        ])->get();
        return view('products-store.products_search', ['products' => $products, 'search' => $search], compact('order'));
    }
    public function create(Request $request)
    {
        $data = [];
        $categories = Category::all();


        return view('products-store.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->photo = $request->photo;
        $products->sizes = $request->sizes;
        $products->mark = $request->mark;
        $products->colors = $request->colors;
        $products->cost_price = $request->cost_price;
        $products->category_id = $request->category_id;
        $products->quantity = $request->quantity;

        $products->save();
        return redirect('/produtos/list');
    }
    public function list(Request $request)
    {
        $data = [];
        $products = Product::all();

        return  view('products-store.list', ['products' => $products], $data);
    }
    public function destroy($id)
    {
        Product::findOrfail($id)->delete();
        return redirect('/produtos/list');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $products = Product::findOrfail($id);
        return view('products-store.edit', ['products' => $products, 'categories' => $categories]);
    }
    public function show($id)

    {
        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();

        $products = Product::findOrfail($id);
        return view('products-store.show', ['products' => $products], compact('order'));
    }
    public function update(Request $request)
    {
        Product::findOrfail($request->id)->update($request->all());
        return redirect('/produtos/list');
    }


    public function contact()
    {
        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();
        return view('contact', compact('order'));
    }
}