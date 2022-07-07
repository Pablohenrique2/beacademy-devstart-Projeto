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
    public function products(Request $request)
    {
        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();
        $search = request('search');
        if ($search) {
            $products = Product::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $products = Product::paginate(12);
        }
        return view('products-store.products', ['products' => $products, 'search' => $search], compact('order'));
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
        $products = Product::findOrfail($id);
        return view('products-store.edit', ['products' => $products]);
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


    public function category($idcategory = null)
    {
        $data = [];
        $categories = Category::all();
        $queryproduct = Product::limit(4);
        if ($idcategory != 0) {
            $queryproduct->where("category_id", $idcategory);
        }

        $product = $queryproduct->get();
        $data['listproducts'] = $product;
        $data['listcategories'] = $categories;
        return view('categories.categories', $data);
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