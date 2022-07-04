@extends('layouts.main')
@section('title','carrinho')
@section('content')
<div class="container">
  <div class="row">
    <h3> Produtos no carrinho</h3>
    <hr>
    @if(Session::has('mensagem-sucesso'))
    <div class="alert alert-success">
      <strong>{{Session::get('mensagem sucesso')}}</strong>

    </div>
    @endif
    @if(Session::has('mensagem falha'))
    <div class=" card-panel red">
      <strong>{{Session::get('mensagem-falha')}}</strong>

    </div>
    @endif
    @forelse($order as $orders)
    <h5 class="col l6 s12 m6">Pedido{{$orders->id}}</h5>
    <h5 class="col l6 s12 m6">Criado em{{$orders->created_at->format('d/m/y H:i')}}</h5>

    <table>
      <thead>
        <tr>
          <th></th>
          <th>QTD</th>
          <th>Produto</th>
          <th>valor unidade</th>
          <th>total</th>
        </tr>
      </thead>
      <tbody>
        @php
        $total_pedido = 0
        @endphp
        @foreach($orders->order_items as $order_item)
        <tr>

          <td>
            <img src="{{$order_item->product->photo}}" alt="" style="width:100px; height: 100%;">
          </td>
          <td class="center-align">
            <div class="center-align">
              <form id="form-delete-product" method="POST" action="{{route('cartdelete')}}">
                {{csrf_field()}}
                @method('DELETE')

                <input type="hidden" name='request_id' value="{{$orders->id}}">
                <input type="hidden" name='product_id' value="{{$order_item->product_id}}">
                <input type="hidden" name="item" value="1">
                <button type="submit">remove_cicle_outline</button>

              </form>

              <span class="col l4 m4 s4">{{$order_item->qtd}}</span>
              <form id="form-add-product" method="post" action="{{route('addcart')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$order_item->product_id}}">
                <button type="submit">adicionar</button>
              </form>

              <i class="material-icons small">add_cicle_outline</i>
              </a>

            </div>
            <form id="form-delete-product" method="POST" action="{{route('cartdelete')}}">
              {{csrf_field()}}
              @method('DELETE')

              <input type="hidden" name='request_id' value="{{$orders->id}}">
              <input type="hidden" name='product_id' value="{{$order_item->product_id}}">
              <input type="hidden" name="item" value="0">
              <button type="submit">Retirar produto</button>

            </form>


          </td>
          <td>
            {{$order_item->product->name}}
          </td>
          <td>R$ {{number_format($order_item->product->price,2,',','.')}}</td>
          @php
          $total_product=$order_item->valores;
          $total_pedido +=$total_product
          @endphp
          <td>R$ {{number_format($total_product,2,',','.')}} </td>
        </tr>
        @endforeach
      </tbody>

    </table>
    <div class="row">
      <strong class="col offset-l6 offset-m16 offset-s16 l4 m4 s4 right-align">Total de pedidos:</strong>
      <span>R$ {{number_format($total_pedido,2,',','.')}}</span>
    </div>
    <div class="row">
      <a class="btn-large tooltipped col offset-l8 offset-m18 offset-s18 l4 m4 s4 " data-position="top" data-delay="50" data-tooltip="voltar a pagina inicial para continuar comprando?" href="{{route('home')}}">Continuar comprando</a>

    </div>
    @empty
    <h5>Não a produto no carrinho...</h5>
    @endforelse
  </div>
</div>



@endsection