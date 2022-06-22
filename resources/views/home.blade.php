@extends('layouts.main')
@section('title','Home')
@section('content')

<h1>home</h1>
@foreach($products as $product)
<p>{{$product->name}}-- {{$product->description}}--{{$product->price}}</p>
@endforeach

@endsection