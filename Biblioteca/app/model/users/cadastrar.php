<? 
require "../database.php";
use App\Model\Database;
$conexao = new Database();

// -- Verificação de senha
$pass = trim($_POST["password"]);
$pass_confirm = trim($_POST["password_confirm"]);

if ($pass === $pass_confirm){ $password = md5($pass); } else { header("Location: ../../controller/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-password"); }

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

if ($conexao->execute($sql)) {
    // -- CRIAÇÃO DO USUÁRIO -- 
    $user = strtolower($_POST['user']);
    $email = $_POST['email'];
    $date = date('Y-m-d H:i:s');
    $employer_id = $conexao->getLastID();

    $sql = "INSERT INTO users(`user`, `password`, `email`, `date`, `employer_id`) 
    VALUES('$user', '$password', '$email', '$date', '$employer_id')";

    if ($conexao->execute($sql)){
        // Redirecionamento, deu certo o cadastro
        header("Location: ../../controller/admin/pages.php?page=funcionarios&status=func_success");die;

    } else {
        // Redirecionamento por erro no cadastro de usuário
        $sql = "DELETE FROM employees WHERE id = '$employer_id'"; $conexao->execute($sql);
        header("Location: ../../controller/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-user");die;
    }

} else {
    // Redirecionamento por erro no cadastro de funcionário
    header("Location: ../../controller/admin/pages.php?page=funcionarios&option=cadastrar&status=func_error-emplo"); die;
}
