<? 
require "../database.php";
use App\Model\Database;
$conexao = new Database();


$user_id = $_POST['user_id'];
$password = md5(trim($_POST["password"]));
$user_dados = $conexao->execute("SELECT `id`, `password` from users where id = $user_id;")->fetch(PDO::FETCH_ASSOC);


if(!strcmp($password, $user_dados["password"])){
    // -- ALTERAÇÃO DO FUNCIONÁRIO --
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $employer_id = $_POST['employer_id'];
    $department = $_POST['department'] ?? $_POST['department_id_edit'];
    $password = (strlen($_POST["password_confirm"]) == 0) ? md5(trim( $_POST["password"])) : md5(trim( $_POST["password_confirm"])); 


    $sql1 = "UPDATE employees SET 
    `name` = '$name', 
    `birthdate` = '$birthdate', 
    `address` = '$address', 
    `salary` = '$salary', 
    `department_id` = '$department'
    WHERE (`id` = '$employer_id');";

    $sql2 = "UPDATE users SET
    `password` = '$password', 
    `email` = '$email'
    WHERE (`id` = '$user_id');";


    if ($conexao->execute($sql1) && $conexao->execute($sql2)){
        // Redirecionamento, deu certo o cadastro
        header("Location: ../../controller/admin/pages.php?page=funcionarios&option=editar&status=func_edit-success&id=". $user_id);
    } else {
        // Redirecionamento por erro no cadastro de funcionário
        header("Location: ../../controller/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_emplo&id=". $user_id);
    }

} else {
    // Redirecionamento por erro no cadastro de usuário
    header("Location: ../../controller/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_user&id=". $user_id);
}

