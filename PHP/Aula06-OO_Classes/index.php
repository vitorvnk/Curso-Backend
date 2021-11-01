<?php 
    class teste {
        //Metodo Construtor
        function __construct($nome) {
            echo 'Ola, Mundo! Opa, ' . $nome.'. ';
        }
    }
    class teste2 {
        public function printta(){
            return 'Um cara legal';
        }
    } 
    
    //Instanciar a classe:
    new teste('Vitor');


    //Classe dentro da variavel
    $banana = new teste2();

    //Acessando funções
    echo $banana->printta(); 
?>