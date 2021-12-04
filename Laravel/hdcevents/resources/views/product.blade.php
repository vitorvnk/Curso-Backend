@extends('layouts.main')
@section('title', 'Produto | HDC Events')
@section('content')

@if($id != null)
    <p>Exibindo o produto ID: {{$id}}</p>
@endif

<a>Bananeira é muito legal </a>

@endsection