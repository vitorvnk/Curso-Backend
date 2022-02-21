<?
require "../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$book_id = $_POST['book_id'];
$name = $_POST['name'];
$cpf = $_POST['cpf'];
$birthdate = $_POST['birthdate'];
$rg = $_POST['rg'];
$address = $_POST['address'];

$sql = "INSERT INTO readers(`cpf`, `name`, `birthdate`, `address`, `rg`) 
            VALUES('$cpf', '$name', '$birthdate', '$address', '$rg')";

if ((new Database())->execute($sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=reader_success");
}
else{
    // Redirecionamento por erro no cadastro
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=reader_error");
}
