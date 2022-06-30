@extends('layouts.main')
@section('title','Home')
@section('content')
<main>

  <section>
    <img style="width:1347px ;" src="/img/banner.jpg" alt="">
  </section>

  <section class="banner spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 offset-lg-4">
          <div class="banner__item">
            <div class="banner__item__pic">
              <img src="/img/banner-1.jpg" alt="">
            </div>
            <div class="banner__item__text">
              <h2>Coleções de roupas 2022</h2>
              <a href="#">Compre agora</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="banner__item banner__item--middle">
            <div class="banner__item__pic">
              <img src="/img/banner-2.jpg" alt="">
            </div>
            <div class="banner__item__text">
              <h2>Acessorios</h2>
              <a href="#">Compre agora</a>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="banner__item banner__item--last">
            <div class="banner__item__pic">
              <img src="/img/banner-3.jpg" alt="">
            </div>
            <div class="banner__item__text">
              <h2>Sapatos Primavera 2022</h2>
              <a href="#">Compre agora</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div>
    <div class="text-center">
      <h1>Mais vendidos</h1>
    </div>

    <section class="d-flex  flex-wrap product-section ">
      @foreach($products as $product)

      <div class="product-disclosure">
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

    </section>
  </div>
</main>
@endsection