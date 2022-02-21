<?php
require "../database.php";
use App\Model\Database;
$conexao = new Database();

//Pega os dados do Post
$id = $_POST['id'];
$password = md5(trim($_POST["senha"]));

// Consulta no Banco de Dados
$sql = "SELECT * from users where id = $id;";
$dados = $conexao->execute($sql)->fetch(PDO::FETCH_ASSOC);

// Agora verifica a senha
if(!strcmp($password, $dados["password"])){
	// Deleta o registro do banco
	$sql = "DELETE FROM users WHERE id = $id;";
	$conexao->execute($sql);

	header("Location: ../../controller/admin/pages.php?page=funcionarios&status=user_success"); die;
}
// Senha inválida
else{
	header("Location: ../../controller/admin/pages.php?page=funcionarios&option=deletar&status=user_password&id=$id"); die;
}


