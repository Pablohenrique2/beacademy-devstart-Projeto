@extends('layouts.novo')
@section('titles',' editar categoria')
@section('conteudo')
<div class="container mb-4">
<h1>Painel de controle</h1>
<div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    produtos
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route("produtos.criar")}}">Adicionar produto</a>
    <a class="dropdown-item" href="{{route("produtos-list")}}">lista de produto</a>
    
  </div>
 </div>
 <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    categorias
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route("category.create")}}">criar categorias</a>
    <a class="dropdown-item" href="{{route("category.index")}}">lista de categorias</a>
    
  </div>
 </div>
</div>
<div class=" container">
  <h1>Editar categoria: {{$category->categories}}</h1>
  <form action="{{route('category.update',$category->id)}}" method="post">
    @csrf
    @method('put')
    <label for="categories" class="form-label">categoria</label>
    <input type="text" name="categories" value="{{$category->categories}}" class="form-control">
    <button type="submit" class="btn btn-primary mt-3">editar</button>
  </form>
</div>
@endsection