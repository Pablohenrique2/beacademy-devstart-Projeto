@extends('layouts.novo')
@section('titles','criar categoria')
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

<div class="container">
  <div >
    <div>
      <h1>Cadastrar categoria</h1>
      
    </div>
    
  </div>
  <form action="{{route('category.store')}}" method="post">
    @csrf
    <label for="categories" class="form-label">categoria</label>
    <input type="text" name="categories" class="form-control">
    <button type="submit" class="btn btn-primary mt-3">cadastrar</button>
  </form>
</div>
@endsection