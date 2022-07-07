@extends('layouts.main')

@section('title' ,'Contato')

@section('content')
<div class="shop-title">
  <h4>Contato</h4>
  <div class="shop-subtitle">
    <a href="/">Home</a><span>></span><span class="detalhe">Contato</span>
  </div>

</div>
<div class="d-flex contact">
  <div class="info">
    <span>INFORMAÇÃO</span>
    <h2>Contatos</h2>
    <p>Como você pode esperar de uma empresa que nasceu de um sonho de ser impreendedor , prestamos muita atenção na nossa loja nos ajude a melhorar.</p>
    <h4>Rio de janeiro</h4>
    <p>195 E Parker Square Dr, Parker, CO 801 </p>
    <p>+21 982-314-0958</p>
    <h4>São Paulo</h4>
    <p>109 Avenue Léon, 63 Clermont-Ferrand </p>
    <p>+12 345-423-9893</p>
  </div>
  <div class="form">
    <form action="">
      <input class="put1" type=" text" placeholder="Nome">
      <input class="put2" type="text" placeholder="e-mail">
      <textarea name="Mensagem" cols="70" rows="6" placeholder="Mensagem"></textarea>
      <button type="submit" class="btn btn-dark" style="border-radius: 0px;">enviar mensagem</button>
    </form>
  </div>
</div>

@endsection