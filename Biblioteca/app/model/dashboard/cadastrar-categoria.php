<?
require "../banco.php";

// COLETA OS DADOS DO POST
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO categories(`name`, `description`) 
VALUES('$name', '$description')";

if (mysqli_query($conexao, $sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_success");
}
else{
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_error");
}
