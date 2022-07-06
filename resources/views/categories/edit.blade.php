@extends('layouts.novo')
@section('titles',' editar categoria')
@section('conteudo')
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