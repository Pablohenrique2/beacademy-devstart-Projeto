@extends('layouts.main')
@section('title', $products->name)
@section('content')


<div class="d-flex  mb-4" style="margin-left: 100px ;  margin-top:50px; ">
  <div>
    <img src="{{$products->photo}}" alt="" style="height:500px">
  </div>
  <div style="width: 422px; margin-left: 50px ;">
    <h1>{{$products->name}}</h1>
    <h4>{{$products->description}}</h4>
    <img src="/img/estrela.png" alt="">
    <h2>R$ {{number_format($products->price, 2, ',', '.' )}}</h2>
    <p>1x sem juros de R$ {{number_format($products->price, 2, ',', '.' )}}</p>
    <a href="">VER AS FORMAS DE PARCELAMENTO</a>
    <div class="d-grid">
      <form action="{{route('addcart')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name='id' value="{{$products->id}}">
        <button type="submit" class="btn btn-info" style="margin-top: 20px; margin-left:10px;">Adicionar produto no carrinho</button>

      </form>
    </div>
  </div>
</div>


@endsection