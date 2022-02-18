<?
require "../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO categories(`name`, `description`) 
VALUES('$name', '$description')";

if ((new Database('books'))->execute($sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../app/controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_success");
}
else{
    header("Location: ../../app/controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_error");
}
