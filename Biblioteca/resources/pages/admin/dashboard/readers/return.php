<? 
use Src\Controller\Admin\RentedBook;
$id = $_GET['id'];


$conect = (new RentedBook(null, empty($_POST) ? null : $_POST, $id));
$dados = $conect->getData();


// Verifica se há dados no Array
if (!$dados){
    echo "<script>document.location='?page=dashboard&option=livros-alugados&status=book_not-found'</script>";
}

$conect->insert();


?>

<head>
    <title>Devolução | Biblio</title>
</head>

<body id="devol_book" class="mb-5">
    <div class="mb-4">
        <h2 class="display-6">Devolução</h2>
        <a href='?page=dashboard&option=livros-alugados'>
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>
    <form method="post" action="?page=dashboard&option=livros-alugados&view=devolvido&id=<?echo$id?>">
        <div class="row">
            <div class="col-2">
                <img src='.<? echo $dados['img'] ?>'>
            </div>
            <div class="col">
                <div class="d-none">
                    <input type="text" name="type" value="devolucao-aluguel">
                    <input type="number" value="<? echo $dados['id'] ?>"  name="id">
                    <input type="number" value="<? echo $_SESSION['id'] ?>"  name="user_id">
                    <input type="number" value="<? echo $dados['reader_id'] ?>"  name="reader_id">
                    <input type="number" value="<? echo $dados['book_id'] ?>"  name="book_id">
                </div>

                <div class="form-group">
                    <table  class='table table-dark'>
                        <tr>
                            <td>Nome: <? echo$dados['nome'] ?></td>
                            <td>RG: <? echo$dados['rg'] ?></td>
                            <td>Aniversário: <? echo$dados['birthdate'] ?></td>
                        </tr>
                    </table>

                    <p>Esse leitor está realizando a devolução do livro "<? echo$dados['livro'] ?>"?</p>

                </div>
                <div class=" mt-5">
                    <button type="submit" class="btn btn_base success">Sim</button>
                </div>
            </div>
        </div>
    </form>
</body>
