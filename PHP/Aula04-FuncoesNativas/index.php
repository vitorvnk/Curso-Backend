<?php
    $nome = 'Vitor é um personagem incrivel';
    $novoNome = str_replace('Vitor','Astolfo',$nome); //irá procurar por algo na string e trocará

    echo $novoNome;
    echo '<br>';

    $novaFrase = substr($nome, 5, 10); //faz um crop e inicia onde eu delimitar

    echo $novaFrase; 
    echo '<br>';

    $novaFrase = explode(' ', $nome); //Converte espaços em array
    
    print_r($novaFrase); 
    echo '<br>';

    $novaFrase = implode(' ', $novaFrase); //converte array em string

    echo $novaFrase; 
    echo '<br>';
    
?>