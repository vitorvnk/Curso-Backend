<?php

require "banco.php";

//Pega os dados do Post
$id = $_POST['id'];
$password = md5(trim($_POST["senha"]));

// Consulta no Banco de Dados
$sql = "SELECT * from users where id = $id;";
$result_id = mysqli_query($conexao, $sql);

// Transforma o Result em array
$dados = mysqli_fetch_array($result_id, MYSQLI_ASSOC);

// Pega o número de linhas resultantes da coluna
$total = mysqli_num_rows($result_id);

if($total == 1){
	// Agora verifica a senha
	if(!strcmp($password, $dados["password"])){
        // Deleta o registro do banco
        $sql = "DELETE FROM users WHERE id = $id;";
        $result_id = mysqli_query($conexao, $sql);

		header("Location: ../controllers/admin/pages.php?page=funcionarios&status=user_success");
		exit;
	}
	// Senha inválida
	else{
		header("Location: ../controllers/admin/pages.php?page=funcionarios&option=deletar&status=user_password&id=$id");
	}
}
mysqli_close($conexao);



