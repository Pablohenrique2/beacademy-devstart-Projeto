@extends('layouts.main')
@section('title','categoria')
@section('content')

<h1>categoria</h1>

@if(isset($listcategories) && count($listcategories)>0 )
<ul>
  @foreach($listcategories as $id => $category)
  <li>{{$category->categories}}</li>
  @endforeach
</ul>
@endif

@endsection