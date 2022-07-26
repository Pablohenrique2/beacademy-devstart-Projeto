@extends('layouts.novo')
@section('titles','criar produto')
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


<div class="container mb-5 mt-5">
  <div >
    <div>
      <h1>Criar Produtos</h1>
      
    </div>
    
    </div>
  </div>


  <form action="/bdproduto" method="Post" enctype="multipart/form-data">
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
      <label for="cost_price" class="form-label">preço de custo</label><br>
      <input type="number" class="form-control" name="cost_price" id="cost_price" placeholder="preço de custo do produto">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label><br>
      <input type="number" class="form-control" name="price" id="price" placeholder=" preço do produto">
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Foto</label><br>
      <input type="file" class="form-control" name="photo" id="photo" placeholder=" foto do produto">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Categoria</label>
      <select class="form-select" aria-label="Default select example" name="category_id">

        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->categories}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">quantidade</label><br>
      <input type="number" class="form-control" name="quantity" id="quantity" placeholder=" quantidade do produto">
    </div>
    <div class="mb-3">
      <label for="mark" class="form-label">Marca</label><br>
      <input type="text" class="form-control" name="mark" id="mark" placeholder=" Marca do produto">
    </div>
    <div class="mb-3">
      <label for="sizes" class="form-label">Tamanho do produto</label><br>
      <input type="text" class="form-control" name="sizes" id="sizes" placeholder=" tamanhos dos produtos Exemplo:p,g,gg">
    </div>
    <div class="mb-3">
      <label for="colors" class="form-label">cor do produto</label><br>
      <input type="text" class="form-control" name="colors" id="colors" placeholder="Cor em estoque do produto">
    </div>


    <input type="submit" class="btn btn-primary">

  </form>
</div>
@endsection