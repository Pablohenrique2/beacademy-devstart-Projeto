@extends('layouts.main')

@section('title' ,'Produtos')

@section('content')

<div class="shop-title">
  @if($search)
  <h4>Buscando por: {{$search}}</h4>
  @else
  <h4>Fazer compras</h4>
  <a href="/">Home</a><span>></span><span class="detalhe">Loja</span>
  @endif
</div>
<div class="d-flex shop-disclosure">
  <div class="shop-disclosure-1">
    <input type="search">
    <div>
      <p>
        <a class="disclosure-cat" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;">
          Categorias <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16" style="margin-left:100px ;">
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
          </svg>
        </a>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <a href="">Homens</a>
          <a href="">Mulheres</a>
        </div>
      </div>
    </div>

  </div>


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

        <a href="/produtos/{{$product->id}}" class="btn btn-primary">Comprar</a>
        <a href="{{route('addcart',['idproduct'=>$product->id])}}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
          </svg></a>
      </div>

      @endforeach
    </div>
  </div>
</div>





@endsection