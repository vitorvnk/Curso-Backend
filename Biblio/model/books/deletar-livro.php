<?php

require "../banco.php";

//Pega os dados do Post
$id = $_POST['id'];
$img = $_POST['img'];

// Consulta no Banco de Dados
$sql = "DELETE FROM books WHERE id = '$id'";


if (mysqli_query($conexao, $sql)){
	unlink("../../".$img);

	header("Location: ../../controllers/admin/pages.php?page=dashboard&status=book_delet");
} else {
	header("Location: ../../controllers/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_delet-error&id=" . $id);
}

mysqli_close($conexao);



