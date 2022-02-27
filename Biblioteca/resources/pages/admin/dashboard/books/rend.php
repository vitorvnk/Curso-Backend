<?
use Src\Model\Admin\Books;
use Src\Model\Admin\Readers;
use Src\Controller\Admin\RentedBook;
use Src\Model\Times;


$hoje = (new Times())->today; 
$limite = (new Times())->limit;

$id = $_GET['id'];
$dados = (new Books(null, null, $search, $id))->getData();
if (!isset($dados)) { echo "<script>document.location='?page=dashboard&status=book_not-found'</script>"; }

$reader = isset($_POST['reader']) ? $_POST['reader'] : FALSE;
if ($reader != FALSE){
    $reader_dados = (new Readers(null, $reader))->getData();
    $total = (new Readers(null, $reader))->getRowCount();
}

(new RentedBook(null, empty($_POST) ? null : $_POST))->insert();



?>

<head>
    <title>Alugar | Biblio</title>
</head>

<body id="alug_book">
    <div class="mb-4" >
            <h2 class="display-6">Alugar Livro</h2>
            <a href="?page=dashboard">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="text-center">
                <?
                    if ($total > 0){
                        echo "
                        <table  class='table table-dark'>
                            <tr>
                                <td>Nome: ". $reader_dados['name'] ."</td>
                                <td>RG: ". $reader_dados['rg'] ."</td>
                                <td>Aniversário: ". $reader_dados['birthdate'] ."</td>
                            </tr>
                        </table>
                        ";
                    } else {
                        echo "
                        <table  class='table table-dark text-danger'>
                            <tr>
                                <td>Não foi possível encontrar o leitor</td>
                            </tr>
                        </table>";
                    }
                ?>
            </div>


            <form action="?page=dashboard&option=alugar-livro&id=<?echo$id?>" method="post">
                <div class="mb-3">
                    <div class="input-group" id="inputs" >
                        <input type="number" id="inputs" class="form-control" placeholder="CPF do Leitor" aria-describedby="reader" name="reader" value="<?echo$reader_dados['cpf']?>" onfocusout="submit()">
                        <button class="btn" type="submit"><ion-icon name="search-outline"></ion-icon></button>
                    </div>
                    <a href='#' data-bs-toggle="modal" data-bs-target="#create_reader">Criar novo leitor</a>
                </div>
            </form>

            <form action="?page=dashboard&option=alugar-livro&id=<?echo$id?>" method="post">
                <div class="d-none">
                    <input type="text" name="type" value="cadastro-aluguel">
                    <input type="text" name="reader_id" value="<?echo$reader_dados['id']?>">
                    <input type="text" name="book_id" value="<?echo$id?>">
                    <input type="text" name="user_id" value="<?echo$_SESSION['id']?>">
                </div> 
                <div class="form-floating mb-3">
                    <input type="date" id="inputs"  class="form-control" aria-describedby="return_date" min="<?echo$hoje?>" max="<?echo$limite?>" name="return_date">
                    <label class="floatingInput" for="">Data de devolução</label>
                </div>
                <div class="mx-auto" style="width: 120px;">
                    <button type="submit" class="btn btn_base success">Registrar</button>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="text-center">
                <img src='.<? echo $dados['img'] ?>'>
            </div>
        </div>
    </div>
</body>

<!-- CRIAÇÃO DE LEITORES -->
<div class="modal fade" id="create_reader" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Leitores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?page=dashboard&option=alugar-livro&id=<?echo$id?>" method="post" class="text-black" enctype="multipart/form-data">
                <div class="d-none">
                    <input type="text" name="type" value="cadastro-leitor">
                    <input type="text" name="book_id" value="<?echo$id?>">
                </div>
            
                <div class="modal-body">
                    <div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="name" required>
                                    <label for="floatingInput">Nome</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="inputs" name="birthdate" required>
                                    <label for="floatingInput">Data de aniversário</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="cpf" required>
                                    <label for="floatingInput">CPF</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="rg" required>
                                    <label for="floatingInput">RG</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="inputs" name="address" required>
                                    <label for="floatingInput">Endereço</label>
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
