@extends('layouts.main')
@section('title', 'Produtos | HDC Events')
@section('content')

<h2>Tela de produtos</h2>

@if($busca != '')
    <p>O usuário está buscando por: {{$busca}}</p>
@endif




@endsection