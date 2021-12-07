<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller{
    #Função que retorna a View do Index
    public function index(){
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }

    #função responsável retornar a view de Criar Evento
    public function create(){
        return view('events.create');
    }








}
