<?php

// Configurações Iniciais do Banco
    $servidor = 'mysqldb';
    $usuario = 'root';
    $senha = 'toor';
    $banco = 'biblioteca';
    $conexao = new \mysqli($servidor, $usuario, $senha, $banco);
    date_default_timezone_set('America/Sao_Paulo');

?>