@extends('layouts.novo')
@section('titles','criar categoria')
@section('conteudo')

<div class="container">
  <div class="d-flex justify-content-between ">
    <div>
      <h1>Cadastrar categoria</h1>
      <a href="{{route('category.index')}}" class="btn btn btn-outline-info">lista de categorias</a>
    </div>
    <div>
      <h1>Criar Produtos</h1>
      <a href="/produtos/list" class="btn btn-outline-info">Ver lista de produtos</a>
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