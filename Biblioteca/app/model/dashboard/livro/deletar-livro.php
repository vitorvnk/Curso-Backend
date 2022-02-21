<?php
require "../../database.php";
use App\Model\Database;

//Pega os dados do Post
$id = $_POST['id'];
$img = $_POST['img'];

// Consulta no Banco de Dados
$sql1 = "DELETE FROM returned WHERE book_id = '$id'";
$sql2 = "DELETE FROM books WHERE id = '$id'";


if ((new Database())->execute($sql1) && (new Database())->execute($sql2)){
	unlink("./../../../../".$img);

	header("Location: ../../../controller/admin/pages.php?page=dashboard&status=book_delet");
} else {
	header("Location: ../../../controller/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_delet-error&id=" . $id);
}

mysqli_close($conexao);



