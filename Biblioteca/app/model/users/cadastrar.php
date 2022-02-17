<? 
require "../banco.php";

// -- Verificação de senha
$pass = trim($_POST["password"]);
$pass_confirm = trim($_POST["password_confirm"]);

if ($pass === $pass_confirm){
    $password = md5($pass);
} else {
    header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-password");
}

// -- CRIAÇÃO DO FUNCIONÁRIO --
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$department = $_POST['department'];

$sql = "INSERT INTO employees(`cpf`, `rg`, `name`, `birthdate`, `address`, `salary`, `department_id`) 
    VALUES('$cpf', '$rg', '$name', '$birthdate', '$address', '$salary', '$department')";

if (mysqli_query($conexao, $sql)) {
    // -- CRIAÇÃO DO USUÁRIO -- 
    $user = strtolower($_POST['user']);
    $email = $_POST['email'];
    $date = date('Y-m-d H:i:s');
    $employer_id = mysqli_insert_id($conexao); 

    $sql = "INSERT INTO users(`user`, `password`, `email`, `date`, `employer_id`) 
    VALUES('$user', '$password', '$email', '$date', '$employer_id')";

    if (mysqli_query($conexao, $sql)){
        // Redirecionamento, deu certo o cadastro
        header("Location: ../../controllers/admin/pages.php?page=funcionarios&status=func_success");

    } else {
        // Redirecionamento por erro no cadastro de usuário
        header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-user");
    }

} else {
    // Redirecionamento por erro no cadastro de funcionário
    header("Location: ../../controllers/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-emplo");
}
