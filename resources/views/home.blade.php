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
        <form action="{{route('addcart')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name='id' value="{{$product->id}}">
          <button type="submit" class="btn btn-danger">adiconar ao carrinho</button>

        </form>
      </div>

      @endforeach

    </section>
  </div>
</main>
@endsection