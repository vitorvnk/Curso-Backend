<?
require "../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$description = $_POST['description'];

$sql = "INSERT INTO authors(`name`, `birthdate`, `description`) 
VALUES('$name', '$birthdate', '$description')";

if ((new Database())->execute($sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=author_success");
}
else{
    header("Location: ../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=author_error");
}
