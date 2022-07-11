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
        <div class="d-flex ">
          <a href="/produtos/{{$product->id}}" class="btn btn-dark">Visualizar</a>
          <form action="{{route('addcart')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name='id' value="{{$product->id}}">
            <button type="submit" class="btn btn-danger" style="margin-top: 20px; margin-left:10px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
              </svg></button>
        </div>
        </form>

      </div>

      @endforeach

    </section>
  </div>
  <section class="d-flex section-promotion">
    <div class="title">
      <h2>Roupas quentes</h2>
      <h3>Coleção de sapatos</h3>
      <h2> Acessórios</h2>
    </div>
    <div class="promotion-img">
      <img src="/img/product-9.jpg" alt="">
    </div>
    <div class="promotion-info">
      <p>OFERTA DA SEMANA</p>
      <h2>Camisa Com Detalhe Florido Camiseta <br> Masculina Slim Cores Marca</h2>
      <h3 class="mt-4">R$ 19,99
      </h3>


      <button class="btn btn-dark mt-4">Compre agora</button>
    </div>
  </section>
  <section class="d-flex mb-5">
    <div class="d-flex flex-wrap" style="width: 780px; height:522; margin-top:100px; margin-left: 100px; margin-bottom:50px;">
      <img style="width: 249.97px; height:261;" src="/img/product-1.jpg" alt="">
      <img style="width: 249.97px; height:261;" src="/img/product-2.jpg" alt="">
      <img style="width: 249.97px; height:261;" src="/img/product-7.jpg" alt="">
      <img style="width: 249.97px; height:261;" src="/img/product-8.jpg" alt="">
      <img style="width: 249.97px; height:261;" src="/img/product-11.jpg" alt="">
      <img style="width: 249.97px; height:261;" src="/img/product-12.jpg" alt="">
    </div>
    <div class="social-network">
      <h2>Instagram</h2>
      <p>Lorem ipsum dolor sit amet, consecteturn <br> adipiscing elit, sed do eiusmod tempor incididunt <br> ut labore et dolore magna aliqua.</p>
      <h3 style="color:#e53637 ;">#Male_Fashion</h3>
    </div>
  </section>
  <div class="container ">
    <div class="text-center">
      <p style="color:#e53637 ;">PARCEIROS</p>
      <h2>Clientes satisfeito</h2>
    </div>
    <div class="d-flex flex-wrap mt-4">
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-1.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px;height: 165px;">
        <img src="/img/client-2.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-3.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-4.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-5.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-6.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-7.png" alt="">
      </div>
      <div class="text-center mb-3" style="width: 262.5px; height: 165px;">
        <img src="/img/client-8.png" alt="">
      </div>
    </div>
  </div>
</main>
@endsection