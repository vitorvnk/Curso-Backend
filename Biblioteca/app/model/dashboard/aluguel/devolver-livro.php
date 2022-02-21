<?php
require "../../database.php";
use App\Model\Database;
$conexao = new Database();


//Pega os dados do Post
$id = $_POST['id'];
$date = date('Y-m-d H:i:s');
$user_id = $_POST['user_id'];
$reader_id = $_POST['reader_id'];
$book_id = $_POST['book_id'];


// Consulta no Banco de Dados
$sql1 = "DELETE FROM rented_books WHERE id = '$id'";
$sql2 = "INSERT INTO returned(`date`,`user_id`,`reader_id`,`book_id`)
		VALUES ('$date','$user_id','$reader_id','$book_id');";


if ($conexao->execute($sql1) && $conexao->execute($sql2)){
	header("Location: ../../../controller/admin/pages.php?page=dashboard&option=livros-alugados&status=return_book");
} else {
	echo "Sem conexão ao banco de dados."; die;
}



