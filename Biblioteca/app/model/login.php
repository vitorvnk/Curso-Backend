<?php
require "database.php";

use App\Model\Database;

// Inicia a Sessão
session_start();

// Coleta os dados usuário
$user = isset($_POST["user"]) ? trim($_POST["user"]) : FALSE;

// coleta a senha
$password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;


// Consulta no Banco de Dados
$sql = "SELECT id, user, password
        FROM users
        WHERE user = '$user' ";

$dados = (new Database())->execute($sql)->fetch(PDO::FETCH_ASSOC);
$total = (new Database())->execute($sql)->rowCount();


if($total == 1){
	// Agora verifica a senha
	if(!strcmp($password, $dados["password"])){
		//Sessão autenticada, redirecionando o usuário
		$_SESSION["id"]= $dados["id"];
		$_SESSION["user"] = $dados["user"];
		echo "<script>document.location='../controller/admin/pages.php'</script>"; die();
	}
	// Senha inválida
	else{
		echo "<script>document.location='../controller/admin/login.php?status=password'</script>"; die();
	}
}
	// Login inválido
else{
	echo "<script>document.location='../controller/admin/login.php?status=login'</script>"; die();
}