<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class StoreController extends Controller
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }
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

        $data = $request->all();

        if ($request->photo) {
            $file = $request['photo'];
            $path = $file->store('profile', 'public');
            $data['photo'] = $path;
        }

        $this->model->create($data);

        return redirect('/produtos/list')->with('productcad', 'Produto cadastrado com sucesso!');
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
        return redirect('/produtos/list')->with('productdel', 'Produto deletado com sucesso!');
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!$product = $this->model->find($id))
            return redirect()->route('products.index');




        if ($request->photo) {
            if ($product->photo && Storage::exists($product->photo)) {
                Storage::delete($product->photo);
            }

            $data['photo'] = $request->photo->store('profile', 'public');
        }

        $product->update($data);
        return redirect('/produtos/list')->with('productedit', 'Produto editado com sucesso!');
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