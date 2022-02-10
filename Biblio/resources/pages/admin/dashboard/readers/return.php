<? 
require "../../model/banco.php";
$id = $_GET['id'];

// Consulta no Banco de Dados

$sql = "select ren.id, ren.date as 'emprestimo', return_date as 'devolucao', rea.name as 'nome', rea.rg, rea.birthdate, boo.title as 'livro', boo.img
    from rented_books ren
    inner join readers rea
        on reader_id = rea.id
    inner join books boo
        on book_id = boo.id
    where ren.id = '$id';";

$result = mysqli_query($conexao, $sql);

// Pega o número de linhas resultantes
$total = mysqli_num_rows($result);

// Transforma o Result em array
$dados = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Verifica se há dados no Array
if (!$dados){
    echo "<script>document.location='?page=dashboard&option=livros-alugados&status=book_not-found'</script>";
} 
?>

<body id="devol_book" class="mb-5">
    <div class="mb-4">
        <h2 class="display-6">Devolução</h2>
        <a href='?page=dashboard&option=livros-alugados'>
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>
    <form method="post" action="../../model/books/devolver-livro.php">
        <div class="row">
            <div class="col-2">
                <img src='../../<? echo $dados['img'] ?>'>
            </div>
            <div class="col">
                <div class="form-group">
                    <table  class='table table-dark'>
                        <tr>
                            <td>Nome: <? echo$dados['nome'] ?></td>
                            <td>RG: <? echo$dados['rg'] ?></td>
                            <td>Aniversário: <? echo$dados['birthdate'] ?></td>
                        </tr>
                    </table>
                    <p>Esse leitor está realizando a devolução do livro "<? echo$dados['livro'] ?>"?</p>

                    <input type="number" value="<? echo $dados['id'] ?>" class="d-none" name="id">
                </div>
                <div class=" mt-5">
                    <button type="submit" class="btn btn_base success">Sim</button>
                </div>
            </div>
        </div>
    </form>
</body>
