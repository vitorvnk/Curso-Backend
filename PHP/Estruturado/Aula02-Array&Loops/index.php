<?php
    /* ARRAY
    $nome = array('nome1'=>'Vitor','Astolfo','Felipe');

    echo $nome['nome1'].'<br>';
    echo $nome[0].'<br>';
    print_r($nome);

    echo '<br> <p>Uma forma automática de percorrer automaticamente:</p>';

    foreach ($nome as $key => $value){
        echo $value;
        echo ', ';
    }
    */
    
    /*LAÇOS DE REPETIÇÃO*/
    $nome = array('Vitor','Astolfo','Felipe','João');

    for($i = 0; $i <10; $i++){
        echo $i;
        echo '<br>';
    }

    echo '<br>';
    for($i = 0; $i < sizeof($nome); $i++){
        echo $nome[$i];
        echo '<br>';
    }

    echo '<br>';

    $i = 0;
    while($i < 10){
        echo $i;
        echo ' ';
        $i++;
    }
?>