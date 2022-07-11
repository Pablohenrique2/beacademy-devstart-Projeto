@extends('layouts.novo')
@section('titles','shopping')
@section('conteudo')
<div class="shop-title">
  <h4>Minhas compras</h4>
  @if(session()->has('compraOk'))
  <div class="alert alert-success">
    <strong>{{session()->get('compraOk')}}</strong>

  </div>
  @endif
  @if(session()->has('mensagem-sucesso'))
  <div class="alert alert-success">
    <strong>{{session()->get('mensagem-sucesso')}}</strong>

  </div>
  @endif
  @if(session()->has('mensagem-falha'))
  <div class="alert alert-danger">
    <strong>{{session()->get('mensagem-falha')}}</strong>

  </div>
  @endif
  <div class="shop-subtitle">
    <a href="/">Home</a><span>></span><span class="detalhe">Minhas compras</span>
  </div>
</div>
<div class="container">
  <div class="row">


    <div></div>
    <div>
      <h4>Compras concluídas</h4>
      @forelse ($shoppin as $order)
      <h5> Pedido: {{ $order->id }} </h5>
      <h5> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
      <form method="POST" action="{{ route('cancelCart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="request_id" value="{{ $order->id }}">
        <table>
          <thead>
            <tr>
              <th colspan="2"></th>
              <th>Produto</th>
              <th>Valor</th>
              <th>Desconto</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @php
            $total_order = 0;
            @endphp
            @foreach ($order->order_product_items as $order_product)
            @php
            $total_product = $order_product->value ;
            $total_order += $total_product;
            @endphp
            <tr>
              <td class="center">
                @if($order_product->status == 'PA')
                <p class="center">
                  <input type="checkbox" id="item-{{ $order_product->id }}" name="id[]" value="{{ $order_product->id }}" />
                  <label for="item-{{ $order_product->id }}">Selecionar</label>
                </p>
                @else
                <strong>CANCELADO</strong>
                @endif
              </td>
              <td>
                <img width="100" height="100" src="{{ $order_product->product->photo}}">
              </td>
              <td>{{ $order_product->product->name}}</td>
              <td>R$ {{ number_format($order_product->value, 2, ',', '.') }}</td>

              <td>R$ {{ number_format($total_product, 2, ',', '.') }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td><strong>Total do pedido</strong></td>
              <td>R$ {{ number_format($total_order, 2, ',', '.') }}</td>
            </tr>
            <tr>
              <td colspan="2">
                <button type="submit">
                  Cancelar
                </button>
              </td>
              <td colspan="3"></td>
            </tr>
          </tfoot>
        </table>
      </form>
      @empty
      <h5 class="center">
        @if ($canceled->count() > 0)
        Neste momento não há nenhuma compra valida.
        @else
        Você ainda não fez nenhuma compra.
        @endif
      </h5>
      @endforelse
    </div>
    <div class="row ">
      <div class="divider"></div>
      <h4>Compras canceladas</h4>
      @forelse ($canceled as $order)
      <div style="margin-top:20px ;">
        <div>
          <h5 class="col l2 s12 m2"> Pedido: {{ $order->id }} </h5>
          <h5 class="col l5 s12 m5"> Criado em: {{ $order->created_at->format('d/m/Y H:i') }} </h5>
          <h5 class="col l5 s12 m5"> Cancelado em: {{ $order->updated_at->format('d/m/Y H:i') }} </h5>
        </div>
        <div class="shopping-cart">
          <table>
            <thead>
              <tr>
                <th></th>
                <th>Produto</th>
                <th>Valor</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php
              $total_order = 0;
              @endphp
              @foreach ($order->order_product_items as $order_product)
              @php
              $total_product = $order_product->value;
              $total_order += $total_product;
              @endphp
              <tr>
                <td>
                  <img width="100" height="100" src="{{ $order_product->product->photo }}">
                </td>
                <td>{{ $order_product->product->name}}</td>
                <td>R$ {{ number_format($order_product->value, 2, ',', '.') }}</td>


                <td>R$ {{ number_format($total_product, 2, ',', '.') }}</td>
              </tr>
        </div>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td><strong>Total do pedido</strong></td>
            <td>R$ {{ number_format($total_order, 2, ',', '.') }}</td>
          </tr>
        </tfoot>
        </table>
      </div>
      @empty
      <h5 class="center">Nenhuma compra ainda foi cancelada.</h5>
      @endforelse
    </div>
  </div>

</div>
@endsection