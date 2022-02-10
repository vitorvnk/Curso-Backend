<?
require "../banco.php";

// COLETA OS DADOS DO POST
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$description = $_POST['description'];

$sql = "INSERT INTO authors(`name`, `birthdate`, `description`) 
VALUES('$name', '$birthdate', '$description')";

if (mysqli_query($conexao, $sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=cadastrar-livro&status=author_success");
}
else{
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=cadastrar-livro&status=author_error");
}
