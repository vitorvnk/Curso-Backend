<?
require "../../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$date = date('Y-m-d H:i:s');
$return_date = $_POST['return_date'];
$reader_id = $_POST['reader_id'];
$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];


$sql = "INSERT INTO rented_books(`date`, `return_date`, `reader_id`, `book_id`, `user_id`) 
VALUES('$date', '$return_date', '$reader_id', '$book_id', '$user_id')";

if ((new Database())->execute($sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../../controller/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=rend_success");
}
else{
    // Redirecionamento por erro
    header("Location: ../../../controller/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=rend_error");
}
