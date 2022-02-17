<?php
require "banco.php";

// Inicia a Sessão
session_start();

// Coleta os dados usuário
$user = isset($_POST["user"]) ? addslashes(trim($_POST["user"])) : FALSE;
// coleta a senha
$password = isset($_POST["password"]) ? md5(trim($_POST["password"])) : FALSE;


// Consulta no Banco de Dados
$sql = "SELECT id, user, password
        FROM users
        WHERE user = '$user' ";

$result_id = mysqli_query($conexao, $sql) or die("Erro no banco!");

// Pega o número de linhas resultantes da coluna
$total = mysqli_num_rows($result_id);

if($total == 1){
	$dados = mysqli_fetch_array($result_id);

	// Agora verifica a senha
	if(!strcmp($password, $dados["password"])){
		//Sessão autenticada, redirecionando o usuário
		$_SESSION["id"]= $dados["id"];
		$_SESSION["user"] = $dados["user"];
		header("Location: ../controllers/admin/pages.php"); die();
	}
	// Senha inválida
	else{
		echo "<script>document.location='../controllers/admin/login.php?status=password'</script>";

	}
}
	// Login inválido
else{
	echo "<script>document.location='../controllers/admin/login.php?status=login'</script>";
}
mysqli_close($conexao);