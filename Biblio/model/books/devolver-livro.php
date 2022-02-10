<?php

require "../banco.php";

//Pega os dados do Post
$id = $_POST['id'];

// Consulta no Banco de Dados
$sql = "DELETE FROM rented_books WHERE id = '$id'";


if (mysqli_query($conexao, $sql)){
	header("Location: ../../controllers/admin/pages.php?page=dashboard&option=livros-alugados&status=return_book");
} else {
	echo "Sem conexão ao banco de dados.";
}

mysqli_close($conexao);



