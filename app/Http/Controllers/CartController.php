<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addcart()
    {
        $this->middleware('VerifyCsrfToken');
        $req = Request();
        $idproduct = $req->input('id');
        $product = Product::find($idproduct);
        if (empty($product->id)) {
            $req->session()->flash('mensagem-falha', 'produto nao encontrado em loja!');
            return redirect()->route('viewCart');
        }
        $iduser = Auth::id();
        $idorder = ModelsRequest::consultaId([
            'user_id' => $iduser,
            'status' => 'RE'

        ]);
        if (empty($idorder)) {
            $order_new = ModelsRequest::create([
                'user_id' => $iduser,
                'status' => 'RE'

            ]);
            $idorder = $order_new->id;
        }
        $user = new OrderItem();
        $user->request_id = $idorder;
        $user->product_id = $idproduct;
        $user->value = $product->price;
        $user->status = 'RE';
        $user->save();


        $req->session()->flash('mensagem-sucesso', 'produto adicionado no carinho com sucesso!');
        return redirect('/carrinho');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewCart()
    {

        $order = ModelsRequest::where(
            [
                'status' => 'RE',
                'user_id' => auth()->id()
            ]
        )->get();

        return view('cart.cart', compact('order'));
    }
    public function deleteCart($indice)
    {
        $this->middleware('VerifyCsrfToken');
        $req = Request();
        $idorder = $req->input('request_id');
        $idproduct  = $req->input('product_id');
        $delete_one_item =(bollean)$req->input('item');
        $iduser = Auth::id();
        $idpedido =
    }
}