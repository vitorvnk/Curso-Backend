<?
require "../banco.php";

// COLETA OS DADOS DO POST
$date = date('Y-m-d H:i:s');
$return_date = $_POST['return_date'];
$reader_id = $_POST['reader_id'];
$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];


$sql = "INSERT INTO rented_books(`date`, `return_date`, `reader_id`, `book_id`, `user_id`, `deleted`) 
VALUES('$date', '$return_date', '$reader_id', '$book_id', '$user_id', 0)";

if (mysqli_query($conexao, $sql)){
    // Redirecionamento, deu certo o cadastro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=rend_success");
}
else{
    // Redirecionamento por erro
    header("Location: ../../controllers/admin/pages.php?page=dashboard&option=alugar-livro&id=$book_id&status=rend_error");
}
