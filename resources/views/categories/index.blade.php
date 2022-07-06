@extends('layouts.novo')
@section('titles','categoria')
@section('conteudo')

<div class="container">
  <h1>Lista de categorias</h1>
  <a href="{{route('category.create')}}" class="btn btn btn-outline-primary">Cadastrar categoria</a>
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