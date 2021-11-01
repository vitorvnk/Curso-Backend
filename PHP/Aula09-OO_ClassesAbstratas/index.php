<?php
    abstract class aplicacao{ //Pai
        public function __construct($nome){
            echo $nome;
        }

        public function runApp(){
            echo 'Funcionando!';
        }
    }

    class Test extends aplicacao{ //filho
        public $numeros = 0;
        public static $contagem = 0;

        public function __construct() {
            parent::__construct('Vitor');
        }

        public static function increment(){
            self::$contagem++;
        }
    }

    $gos = new Test();
    echo '<br>';
    $gos->runApp();


    //Não pode ser instanciada diretamente a classe abstrata
?>