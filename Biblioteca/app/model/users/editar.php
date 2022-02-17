<? 
require "../banco.php";

// -- ALTERAÇÃO DO FUNCIONÁRIO --
$employer_id = $_POST['employer_id'];
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$department = $_POST['department'] ?? $_POST['department_id_edit'];

// --Atualiza a tabela de Funcionários no banco
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
    $password_confirm = md5(trim($_POST["password_confirm"]));
    $email = $_POST['email'];

    // -- Coleta a senha do usuário no banco de dados
    $user_dados = mysqli_fetch_array($conexao->query("SELECT `id`, `password` from users where id = $user_id;"));


    if(!strcmp($password, $user_dados["password"])){
        $sql = "UPDATE users SET
        `password` = '$password_confirm', 
        `email` = '$email'
        WHERE (`id` = '$user_id');";

        if (mysqli_query($conexao, $sql)){
            // Redirecionamento, deu certo o cadastro
            header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-success&id=". $user_id);
        }
    } else {
        // Redirecionamento por erro no cadastro de usuário
        header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_user&id=". $user_id);
    }

} else {
    // Redirecionamento por erro no cadastro de funcionário
    header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=editar&status=func_edit-error_emplo&id=". $user_id);
}
