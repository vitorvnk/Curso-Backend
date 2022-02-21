<? 
use App\Model\Database;
$id = $_GET['id'];

// Consulta no Banco de Dados
$sql = "SELECT * from users where id = $id;";
$dados = (new Database())->execute($sql)->fetch(PDO::FETCH_ASSOC);

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

    <form method="post" action="../../model/users/delet.php">
        <div class="form-group">
            <p>Você realmente deseja excluir usuário "<b><? echo $dados['user'] ?></b>" com e-mail <b>"<? echo $dados['email'] ?>"</b>"?</p>
            
            <input type="number" value="<? echo $dados['id'] ?>" class="d-none" name="id">

            <label for="floatingInput">Digite a senha deste usuário</label>
            <input type="password" class="form-control" id="inputs" name="senha" placeholder="**********"  required autofocus>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn_base fail">Excluir</button>
        </div>
    </form>
</body>
