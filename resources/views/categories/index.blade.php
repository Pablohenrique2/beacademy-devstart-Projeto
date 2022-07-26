@extends('layouts.novo')
@section('titles','categoria')
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
  <h1>Lista de categorias</h1>
  
  <table class="table">
    <thead>
      <tr>

        <th scope="col">Nome da categoria</th>
        <th scope="col">ações</th>

      </tr>
    </thead>
    <tbody>

      @foreach($categories as $category )
      <tr>


        <td>
          <p>{{$category->categories}}</p>
        </td>
        <td>
          <form action="{{route('category.destroy',$category->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">deletar</button>
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">editar</a>
        </td>


      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection