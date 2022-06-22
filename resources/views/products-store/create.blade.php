@extends('layouts.main')
@section('title','criar produto')
@section('content')

<h1>criar</h1>

<form action="/bdproduto" method="Post">
  @csrf
  <input type="text" name="name" placeholder=" escreva o nome do produto"><br>
  <input type="text" name="description" placeholder=" descrição do produto"><br>
  <input type="number" name="price" placeholder=" preço do produto"><br>
  <input type="text" name="photo" placeholder=" foto do produto"><br>
  <input type="number" name="category_id" placeholder=" categoria do produto"><br>
  <input type="number" name="quantity" placeholder=" quantidade do produto"><br>
  <input type="submit" class="btn btn-primary">

</form>

@endsection