@extends('layouts.main')

@section('title' ,'Produtos')

@section('content')


@if($search)
<p>Buscando por: {{$search}}</p>
@else
<h1>Produtos</h1>
@endif

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias quidem accusamus rem magni non vel in dignissimos voluptate consequatur facilis? Magni, perspiciatis eum. Nam unde illo iure alias suscipit modi?</p>
<div class="d-flex">
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
</div>






@endsection