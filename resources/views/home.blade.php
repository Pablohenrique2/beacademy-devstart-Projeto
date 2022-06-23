@extends('layouts.main')
@section('title','Home')
@section('content')
<main>

  <section>
    <img style="width:1350px ;" src="/img/banner.jpg" alt="">
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
              <h2>Clothing Collections 2030</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="banner__item banner__item--middle">
            <div class="banner__item__pic">
              <img src="/img/banner-2.jpg" alt="">
            </div>
            <div class="banner__item__text">
              <h2>Accessories</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="banner__item banner__item--last">
            <div class="banner__item__pic">
              <img src="/img/banner-3.jpg" alt="">
            </div>
            <div class="banner__item__text">
              <h2>Shoes Spring 2030</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="d-flex container">
    @foreach($products as $product)

    <div style=" width:200px ; margin-bottom:10px; margin-left:20px;">
      <div style="width:200px ;">
        <img style="width:200px ;" src="{{$product->photo}}" alt="">
      </div>
      <h6>{{$product->name}}</h6>
      <h5>{{$product->price}}</h5>

      <a href="/produtos/{{$product->id}}" class="btn btn-primary">Comprar</a>
    </div>

    @endforeach

  </section>

</main>
@endsection