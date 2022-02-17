<?php

require "../banco.php";

//Pega os dados do Post
$id = $_POST['id'];

// Consulta no Banco de Dados
$sql = "UPDATE rented_books SET `deleted` = 1 where id = '$id';";

if (mysqli_query($conexao, $sql)){
	header("Location: ../../controllers/admin/pages.php?page=dashboard&option=livros-alugados&status=return_book");
} else {
	echo "Sem conexão ao banco de dados.";
}

mysqli_close($conexao);



