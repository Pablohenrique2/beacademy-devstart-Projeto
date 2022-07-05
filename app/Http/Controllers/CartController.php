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
    public function deleteCart()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder           = $req->input('request_id');
        $idproduct          = $req->input('product_id');
        $delete_one_item = (bool)$req->input('item');
        $iduser          = Auth::id();

        $idorder = ModelsRequest::consultaId([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'RE' // Reservada
        ]);

        if (empty($idorder)) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('carrinho.index');
        }

        $where_product = [
            'request_id'  => $idorder,
            'product_id' => $idproduct
        ];

        $product = OrderItem::where($where_product)->orderBy('id', 'desc')->first();
        if (empty($product->id)) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('carrinho.index');
        }

        if ($delete_one_item) {
            $where_product['id'] = $product->id;
        }
        OrderItem::where($where_product)->delete();

        $check_order = OrderItem::where([
            'request_id' => $product->request_id
        ])->exists();

        if (!$check_order) {
            ModelsRequest::where([
                'id' => $product->request_id
            ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('viewcart');
    }
    public function concludeCart()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder  = $req->input('request_id');
        $iduser = Auth::id();

        $check_order = ModelsRequest::where([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'RE' // Reservada
        ])->exists();

        if (!$check_order) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
        }

        $check_product = OrderItem::where([
            'request_id' => $idorder
        ])->exists();
        if (!$check_product) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
        }

        OrderItem::where([
            'request_id' => $idorder
        ])->update([
            'status' => 'PA'
        ]);
        ModelsRequest::where([
            'id' => $idorder
        ])->update([
            'status' => 'PA'
        ]);

        $req->session()->flash('mensagem-sucesso', 'Compra concluída com sucesso!');

        return redirect('/compras');
    }
    public function shoppingCart()
    {

        $shoppin = ModelsRequest::where([
            'status'  => 'PA',
            'user_id' => Auth::id()
        ])->orderBy('created_at', 'desc')->get();


        $canceled = ModelsRequest::where([
            'status'  => 'CA',
            'user_id' => Auth::id()
        ])->orderBy('updated_at', 'desc')->get();

        return view('cart.shopping', compact('shoppin', 'canceled'));
    }
    public function cancelCart()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder       = $req->input('request_id');
        $idsorder_prod = $req->input('id');
        $iduser      = Auth::id();

        if (empty($idsorder_prod)) {
            $req->session()->flash('mensagem-falha', 'Nenhum item selecionado para cancelamento!');
            return redirect()->route('shoppingCart');
        }

        $check_order = ModelsRequest::where([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'PA' // Pago
        ])->exists();

        if (!$check_order) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para cancelamento!');
            return redirect()->route('shoppingCart');
        }

        $check_product = OrderItem::where([
            'request_id' => $idorder,
            'status'    => 'PA'
        ])->whereIn('id', $idsorder_prod)->exists();

        if (!$check_product) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('carrinho.compras');
        }

        OrderItem::where([
            'request_id' => $idorder,
            'status'    => 'PA'
        ])->whereIn('id', $idsorder_prod)->update([
            'status' => 'CA'
        ]);

        $check_order_cancel = OrderItem::where([
            'request_id' => $idorder,
            'status'    => 'PA'
        ])->exists();

        if (!$check_order_cancel) {
            ModelsRequest::where([
                'id' => $idorder
            ])->update([
                'status' => 'CA'
            ]);

            $req->session()->flash('mensagem-sucesso', 'Compra cancelada com sucesso!');
        } else {
            $req->session()->flash('mensagem-sucesso', 'Item(ns) da compra cancelado(s) com sucesso!');
        }

        return redirect()->route('shoppingCart');
    }
}