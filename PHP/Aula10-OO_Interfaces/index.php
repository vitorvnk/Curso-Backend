<?php

use aplicacao as GlobalAplicacao;

interface UmTeste{
        public function runApp();
        public function  getNome();
    }

    class aplicacao implements UmTeste{ //Pai
        private $nome;
        
        public function __construct(string $nome){
            $this->$nome = $nome;
        }

        public function runApp(){
            echo 'Funcionando!';
        }

        public function getNome(){
            return $this->nome;
        }
    }

    

    $gos = new aplicacao('Pele'); 
    echo $gos->getNome();


    //Não pode ser instanciada diretamente a classe abstrata
?>