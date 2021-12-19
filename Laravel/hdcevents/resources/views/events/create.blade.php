@extends('layouts.main')
@section('title', 'Criar Evento | HDC Events')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="post">
        @csrf
        <div id="form-group col-md-4">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div id="form-group col-md-4">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <div id="form-group col-md-4">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div id="form-group col-md-4">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que irá acontecer no evento?"></textarea>
        </div><br>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>




@endsection