@extends('layouts.main')
@section('title','carrinho')
@section('content')
<div class="container">
  <h3>carrinho</h3>
  @if(isset($cart)&& count($cart)>0)

  <table class="table">
    <thead>
      <tr>

        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">photo</th>
        <th scope="col">Remover produto</th>


      </tr>
    </thead>
    <tbody>
      @foreach($cart as $indice => $product)
      <tr>

        <td>{{$product->name}}</td>
        <td>R${{number_format($product->price, 2, ',', '.' )}}</td>
        <td><img src="{{$product->photo}}" alt="" style="width: 50px;"></td>
        </td>
        <td>
          <a href="{{route('cart_delete',['indice'=>$indice])}}" class="btn btn-danger btn-sm">
            del
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @else
  <p>Nenhum item no carrinho</p>
  @endif
</div>

@endsection