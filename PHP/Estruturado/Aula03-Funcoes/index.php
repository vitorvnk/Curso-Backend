<?php
    function olaMundo(){
        echo 'Olá mundo de idiotas!!!!';
    }

    function somaTumatico($num1, $num2){
        return $num1+$num2;
    }

    olaMundo();

    echo '<br>';

    $value = somaTumatico(10,20);
    echo $value;
?>