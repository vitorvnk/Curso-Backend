<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
});

Route::get('/contatos', function () {
    return view('contact');
});

Route::get('/produtos', function () {
    $busca = request('search');
    return view('products', ['busca' => $busca]);
});

Route::get('/produtos/{id}', function ($id) {
    return view('product', ['id' => $id]);
});

Route::get('/produtosteste/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});