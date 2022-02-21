<?
require "../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO categories(`name`, `description`) 
VALUES('$name', '$description')";

if ((new Database())->execute($sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_success");
}
else{
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=category_error");
}
