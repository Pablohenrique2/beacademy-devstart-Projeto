@extends('layouts.main')
@section('title','lista')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
  <h1>meus produtos</h1>

</div>
<div class="col-md-10 offset-md-1 dashboard-product-container">
  @if(count($products)>0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">descrição</th>
        <th scope="col">price</th>
        <th scope="col">quantidade</th>
        <th scope="col">photo</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td><img src="{{$product->photo}}" alt="" style="width: 50px;"></td>
        <td><a href="" class="btn btn-info edit-btn">Editar</a>
          <form action="/produtos/{{$product->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger delet-btn">Deletar</button>
          </form>
        </td>



      </tr>
      @endforeach
    </tbody>
  </table>





  @else
  <p>não possui nenhum produto no momento <a href="/produtos/criar">Adicionar produtos</a></p>
  @endif

</div>


@endsection