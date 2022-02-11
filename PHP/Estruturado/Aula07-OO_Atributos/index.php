<?php
    class Test{
        public $numeros = 0;
        public static $contagem = 0;

        public static function increment(){
            self::$contagem++;
        }
    }

    new Test();
    Test::increment();
    Test::increment();
    Test::increment();
    Test::increment();
    echo Test::$contagem;

    //Os metodos static são isolados da classe!
?>