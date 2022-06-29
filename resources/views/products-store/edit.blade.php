@extends('layouts.main')
@section('title','Editar produto' . $products->name)
@section('content')

<h1>Editando: {{$products->name}}</h1>

<form action="/produtos/update/{{$products->id}}" method="post">
  @csrf
  @method('PUT')
  <input type="text" name="name" value="{{$products->name}}" placeholder=" escreva o nome do produto"><br>
  <input type="text" name="description" value="{{$products->description}}" placeholder=" descrição do produto"><br>
  <input type="number" name="price" value="{{$products->price}}" placeholder=" preço do produto"><br>
  <input type="text" name="photo" value="{{$products->photo}}" placeholder=" foto do produto"><br>
  <img src="{{$products->photo}}" alt="imagem produto" style="width: 50px;">
  <input type="number" name="category_id" value="{{$products->category_id}}" placeholder=" categoria do produto"><br>
  <input type="number" name="quantity" value="{{$products->quantity}}" placeholder=" quantidade do produto"><br>
  <input type="submit" class="btn btn-primary">

</form>

@endsection