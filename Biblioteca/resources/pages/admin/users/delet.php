<? 
use Src\Controller\Admin\User;

$id = $_GET['id'];
$conect = (new User(empty($_POST) ? null : $_POST, $id));

$dados = $conect->getData();

if (!empty($_POST) != 1){
    $conect->editDelet();
}


// Verifica se há dados no Array
if (!$dados){ echo "<script>document.location='?page=funcionarios&status=user_not-found'</script>"; }

?>

<head>
    <title>Deletar | Biblio</title>
</head>

<body id="form_employess" class="mb-5">
    <div class="mb-4" >
        <h2 class="display-6">Deletar</h2>
        <a href="?page=funcionarios">
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>

    <form method="post" action="?page=funcionarios&option=deletar&id=<?echo$id?>">
        <div class="form-group">
            <div class="d-none">
                <input type="text" name="type" value="delete">
                <input type="number" value="<? echo $dados['id'] ?>" name="id">
            </div>

            <p>Você realmente deseja excluir usuário "<b><? echo $dados['user'] ?></b>" com e-mail <b>"<? echo $dados['email'] ?>"</b>"?</p>
            <label for="floatingInput">Digite a senha deste usuário</label>
            <input type="password" class="form-control" id="inputs" name="password" placeholder="Senha"  required autofocus>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn_base fail">Excluir</button>
        </div>
    </form>
</body>
