@extends('layouts.main')
@section('title' ,'Produtos')
@section('content')

<div class="shop-title">


  <h4>Fazer compras</h4>
  <div class="shop-subtitle">
    <a href="/">Home</a><span>></span><span class="detalhe">Buscando por:{{$search}}</span>
  </div>

</div>
<div class=" shop-disclosure container">

  <div>
    <p>
      Exibindo 1–12 de 126 resultados</p>
    <div class="d-flex flex-wrap shop">


      @foreach($products as $product)

      <div class="disclosure">
        <div>
          <img src="{{$product->photo}}" alt="">
        </div>
        <h6>{{$product->name}}</h6>
        <h5>R$ {{number_format($product->price, 2, ',', '.' )}}</h5>
        <div class="d-flex">
          <a href="/produtos/{{$product->id}}" class="btn btn-dark">Comprar</a>
          <form action="{{route('addcart')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name='id' value="{{$product->id}}">
            <button type="submit" class="btn btn-danger" style="margin-top: 20px; margin-left:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg></button>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>

</div>





@endsection