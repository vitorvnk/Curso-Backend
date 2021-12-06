<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller{
    #Função que retorna a View do Index
    public function index(){
        $nome = "Astolfo";
        $idade = 20;
        $nomes = ['Vitor','João','Paçoca'];
    
        $arr = [1,2,3,4,5,6,7,1,2,3,4,5,6,76,5,4];
    
        return view('welcome', 
            [
                'nome' => $nome, 
                'idade'=>$idade, 
                'array'=>$arr,
                'nomes'=> $nomes,
        ]);
    }

    #função responsável retornar a view de Criar Evento
    public function create(){
        return view('events.create');
    }








}
