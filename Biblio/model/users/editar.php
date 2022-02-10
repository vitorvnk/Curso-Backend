<? 
require "../banco.php";

// -- ALTERAÇÃO DO FUNCIONÁRIO --
$employer_id = $_POST['employer_id'];
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$department = isset($_POST['department']) ? $_POST['department'] : $_POST['department_id_edit'];

$sql = "UPDATE employees SET 
        `name` = '$name', 
        `birthdate` = '$birthdate', 
        `address` = '$address', 
        `salary` = '$salary', 
        `department_id` = '$department'
        WHERE (`id` = '$employer_id');";


if (mysqli_query($conexao, $sql)) {
    // -- ALTERAÇÃO DO USUÁRIO -- 
    $user_id = $_POST['user_id'];
    $password = md5(trim($_POST["password"]));
    $email = $_POST['email'];

    $sql = "UPDATE users SET
            `password` = '$password', 
            `email` = '$email'
            WHERE (`id` = '$user_id');";

    if (mysqli_query($conexao, $sql)){
        // Redirecionamento, deu certo o cadastro
        header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-success&id=". $user_id);

    } else {
        // Redirecionamento por erro no cadastro de usuário
        header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_user&id=". $user_id);
    }

} else {
    // Redirecionamento por erro no cadastro de funcionário
    header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_emplo&id=". $user_id);
}

mysqli_close($conexao);