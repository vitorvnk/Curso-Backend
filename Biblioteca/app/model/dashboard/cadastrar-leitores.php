<?
require "../banco.php";

// COLETA OS DADOS DO POST
$book_id = $_POST['book_id'];
$name = $_POST['name'];
$cpf = $_POST['cpf'];
$birthdate = $_POST['birthdate'];
$rg = $_POST['rg'];
$address = $_POST['address'];


$sql = "INSERT INTO readers(`cpf`, `name`, `birthdate`, `address`, `rg`) 
VALUES('$cpf', '$name', '$birthdate', '$address', '$rg')";


if (mysqli_query($conexao, $sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=reader_success");
}
else{
    // Redirecionamento por erro no cadastro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=reader_error");
}
