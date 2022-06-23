@extends('layouts.main')
@section('title', $products->name)
@section('content')


<div>
  <img src="{{$products->photo}}" alt="">
  <p>{{$products->price}}</p>

</div>


@endsection