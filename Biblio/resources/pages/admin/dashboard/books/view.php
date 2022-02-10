<?
require "../../model/banco.php";
$id = $_GET['id'];

$sql = "select books.id, books.title, books.img, authors.name as author, books.description, books.date, authors.birthdate, authors.description as inform , categories.name as category
        from books
        inner join authors
            on author_id = authors.id
        inner join categories
            on category_id = categories.id
        where books.id='$id'";


$result = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($result);
$dados = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (!$dados) {
    echo "<script>document.location='?page=dashboard&status=book_not-found'</script>";
}

?>

<body id="view_book">
    <div class="mb-4" >
            <h2 class="display-6">Detalhes</h2>
            <a href="?page=dashboard">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <div class="row">
        <div class="col-8">
            <table  class="table table-borderless mb-3 text-justify">
                <tr>
                    <th>Titulo</th>
                    <td><? echo $dados['title'] ?></td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td><? echo $dados['description'] ?></td>
                </tr>
                <tr>
                    <th>Ano de Lançamento</th>
                    <td><? echo $dados['date'] ?></td>
                </tr>
                <tr>
                    <th>Categoria</th>
                    <td><? echo $dados['category'] ?></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td><? echo $dados['author'] ?></td>
                </tr>
                <tr>
                    <th>Nascimento do Autor</th>
                    <td><? echo $dados['birthdate'] ?></td>
                </tr>
                <tr>
                    <th>Mais sobre o Autor</th>
                    <td><? echo $dados['inform'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col text-center">
            <img src='../../<? echo $dados['img'] ?>'>
            <div class="mt-3">
                <a href='?page=dashboard&option=alugar-livro&id=<?echo$dados['id']?>'><button type='button' class='btn btn-sm btn_base success'>Alugar</button></a>
                <a href='#' data-bs-toggle="modal" data-bs-target="#update"><button type='button' class='btn btn_base second'>Editar</button></a>
                <a href='#' data-bs-toggle="modal" data-bs-target="#delete"><button type='button' class='btn btn_base fail'>Deletar</button></a>
            </div>
        </div>
    </div>

</body>



<!-- CONFIRMAÇÃO DE DELETE -->
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../model/books/deletar-livro.php" method="post">
                <div class="modal-body">
                    <input type="number" class="d-none" name="id" value="<?echo$dados['id']?>">
                    <input type="text" class="d-none" name="img" value="<?echo$dados['img']?>">
                    <p>Você realmente deseja deletar esse livro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_base grey" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn_base fail">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDIÇÃO DOS LIVROS -->
<div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atualizar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../model/books/atualizar-livro.php" method="post" class="text-black" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="number" class="d-none" name="id" value="<?echo$dados['id']?>">
                    <input type="text" class="d-none" name="img_antiga" value="<? echo $dados['img'] ?>">
                    <div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="title" value="<? echo $dados['title'] ?>" required>
                                    <label for="floatingInput">Título do Livro</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="inputs" name="date" value="<? echo $dados['date'] ?>" required>
                                    <label for="floatingInput">Ano de lançamento</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="inputs" name="description" cols="30" rows="5"><? echo $dados['description'] ?></textarea>
                                    <label for="floatingInput">Descrição</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="mb-3" id="file">
                                    <label for="arquivo">Adicione uma Imagem</label><br>
                                    <input name="arquivo" id="arquivo" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_base grey" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn_base success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
