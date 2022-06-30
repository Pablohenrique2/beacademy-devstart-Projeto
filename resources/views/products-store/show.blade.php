@extends('layouts.main')
@section('title', $products->name)
@section('content')


<div class="d-flex">
  <div>
    <img src="{{$products->photo}}" alt="" style="height:600px">
  </div>
  <div>
    <h1>{{$products->name}}</h1>
    <h2>R$ {{number_format($products->price, 2, ',', '.' )}}</h2>
    <button class="btn btn-info">Adicionar a sacola</button>
    <button class="btn btn-danger">Comprar agora</button>

  </div>
</div>


@endsection