@extends('layouts.main')
@section('title', 'HDC Events')
@section('content')

<h1>Algum Título</h1>
@if(2 > 5)
    <p>A condição é true</p>
@endif

<p>{{$nome}}</p>

@if($nome == "Pedro")
    <p>O nome é {{$nome}}</p>
@else
    <p>O nome não é Pedro e sim {{$nome}}. Ele possui {{$idade}} anos.</p>
@endif

@for($i = 0; $i < count($array); $i++)
    <a>{{$array[$i]}}</a>
@endfor

@for($i = 0; $i < 100; $i++)
    <a>{{$i}}</a>
@endfor

@php
    $name = "Vitor";
    echo $name;
@endphp

@foreach($nomes as $nome)
    <p>{{$loop->index}} - {{$nome}}</p>
@endforeach


<!-- Comentário do HTML -->
{{-- Comentário do Blade, não aparece no Inspecionar Elemento --}}

@endsection
