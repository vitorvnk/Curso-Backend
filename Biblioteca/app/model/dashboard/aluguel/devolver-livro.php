<?php
require "../../database.php";
use App\Model\Database;

//Pega os dados do Post
$id = $_POST['id'];

// Consulta no Banco de Dados
$sql = "UPDATE rented_books SET `deleted` = 1 where id = '$id';";

if ((new Database('books'))->execute($sql)){
	header("Location: ../../../app/controller/admin/pages.php?page=dashboard&option=livros-alugados&status=return_book");
} else {
	echo "Sem conexão ao banco de dados."; die;
}



