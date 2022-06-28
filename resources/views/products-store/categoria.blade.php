@extends('layouts.main')
@section('title','categoria')
@section('content')

<h1>categoria</h1>

@if(isset($listacategorias) && count($listacategorias)>0 )
<ul>
  @foreach($listacategorias as $id => $categoria)
  <li>{{$categoria->categories}}</li>
  @endforeach
</ul>

@endif
@endsection