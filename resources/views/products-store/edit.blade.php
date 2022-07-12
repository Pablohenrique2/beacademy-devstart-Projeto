@extends('layouts.novo')
@section('titles','Editar produto' . $products->name)
@section('conteudo')


<div class="container mb-5">
  <h1>Editando: {{$products->name}}</h1>

  <form action="/produtos/update/{{$products->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="name" class="form-label">Nome</label><br>
      <input type="text" name="name" id="name" class="form-control" value="{{$products->name}}" placeholder=" escreva o nome do produto">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descrição</label><br>
      <input type="text" name="description" id="description" class="form-control" value="{{$products->description}}" placeholder=" descrição do produto">
    </div>
    <div class="mb-3">
      <label for="cost_price" class="form-label">preço de custo</label><br>
      <input type="number" class="form-control" name="cost_price" id="cost_price" value="{{$products->cost_price}}" placeholder="preço de custo do produto">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Preço</label><br>
      <input type="number" name="price" id="price" class="form-control" value="{{$products->price}}" placeholder=" preço do produto">
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Foto</label><br>
      <input type="text" name="photo" class="form-control" value="{{$products->photo}}" id="photo" placeholder=" foto do produto">
    </div>
    <div>
      <img src="{{$products->photo}}" alt="imagem produto" style="width: 50px;">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Categoria</label>
      @foreach($categories as $category)
      @if($category->id == $products->category_id)
      <input type="text" value="{{$category->categories}}" class="form-select" disabled>
      @endif
      @endforeach
      <label for="" class="form-label">Selecionar nova categoria:</label>
      <select class="form-select" aria-label="Default select example" name="category_id">

        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->categories}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="quantity" class="form-label">quantidade</label><br>
      <input type="number" name="quantity" id="quantity" class="form-control" value="{{$products->quantity}}" placeholder=" quantidade do produto">
    </div>
    <div class="mb-3">
      <label for="mark" class="form-label">Marca</label><br>
      <input type="text" class="form-control" name="mark" id="mark" placeholder=" Marca do produto" value="{{$products->mark}}">
    </div>
    <div class="mb-3">
      <label for="sizes" class="form-label">Tamanho do produto</label><br>
      <input type="text" class="form-control" name="sizes" id="sizes" placeholder=" tamanhos dos produtos Exemplo:p,g,gg" value="{{$products->size}}">
    </div>
    <div class="mb-3">
      <label for="colors" class="form-label">cor do produto</label><br>
      <input type="text" class="form-control" name="colors" id="colors" placeholder="Cor em estoque do produto" value="{{$products->colors}}">
    </div>

    <input type="submit" class="btn btn-primary">

  </form>
</div>
@endsection