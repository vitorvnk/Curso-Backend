@extends('layouts.main')
@section('title', " Editando '$event->title' | HDC Events")
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando '{{$event->title}}'</h1>
    <form action="/events/update/{{$event->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="form-group col-md-4">
            <label for="title">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img src="/img/events/{{ $event->image }}" alt="{{$event->title}}" class="img-preview">
        </div>
        <div id="form-group col-md-4">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title}}">
        </div>
        <div id="form-group col-md-4">
            <label for="date">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
        </div>
        <div id="form-group col-md-4">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{$event->city}}">
        </div>
        <div id="form-group col-md-4">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{$event->private == 1? "selected='selected'" : ""}}>Sim</option>
            </select>
        </div>
        <div id="form-group col-md-4">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que irá acontecer no evento?">{{$event->description}}</textarea>
        </div>
        <div id="form-group col-md-4">
            <label for="title">Adicione elementos da infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco">Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Grátis">Cerveja Grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food">Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes">Brindes
            </div>
        </div><br>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>






@endsection