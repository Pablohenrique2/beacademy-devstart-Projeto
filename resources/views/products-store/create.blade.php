@extends('layouts.novo')
@section('titles','criar produto')
@section('conteudo')
<div class="container mb-5">
  <div class="d-flex justify-content-between ">
    <div>
      <h1>Criar Produtos</h1>
      <a href="/produtos/list" class="btn btn-outline-info">Ver lista de produtos</a>
    </div>
    <div class=" text-center">
      <h1>Criar Categoria</h1>
      <div>
        <a href="{{route('category.index')}}" class="btn btn-outline-info">Ir para categorias</a>
      </div>
    </div>
  </div>


  <form action="/bdproduto" method="Post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label><br>
      <input type="text" class="form-control" name="name" id="name" placeholder=" escreva o nome do produto">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descrição</label><br>
      <input type="text" class="form-control" name="description" id="description" placeholder=" descrição do produto">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label><br>
      <input type="number" class="form-control" name="price" id="price" placeholder=" preço do produto">
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Foto</label><br>
      <input type="text" class="form-control" name="photo" id="photo" placeholder=" foto do produto">
    </div>
    <div class="mb-3">
      <label for="category_id" class="form-label">categoria</label><br>
      <input type="number" class="form-control" name="category_id" id="category_id" placeholder=" categoria do produto">
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">quantidade</label><br>
      <input type="number" class="form-control" name="quantity" id="quantity" placeholder=" quantidade do produto">
    </div>
    <input type="submit" class="btn btn-primary">

  </form>
</div>
@endsection