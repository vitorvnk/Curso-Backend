<? 
require "../../model/banco.php";
$option = $_GET['option'];


// Consulta no Banco
$sql = "SELECT * from authors;";
$result_authors = mysqli_query($conexao, $sql);

$sql = "SELECT * from categories;";
$result_categories = mysqli_query($conexao, $sql);

// Pega o número de linhas resultantes
$authors_num = mysqli_num_rows($result_authors);
$categories_num = mysqli_num_rows($result_categories);

// Transforma o result em array
$authors =  mysqli_fetch_all($result_authors, MYSQLI_ASSOC);
$categories =  mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
?>

<head>
    <title>Cadastrar | Biblio</title>
</head>

<body id="register_book">
    <div class="mb-4" >
            <h2 class="display-6">Cadastrar Livro</h2>
            <a href="?page=dashboard">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>

    <form method="post" class="text-black mb-5" enctype="multipart/form-data" action="../../model/books/<? echo $option ?>.php">
        <div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="inputs" name="title" required>
                        <label for="floatingInput">Título do Livro</label>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="inputs" name="date" required>
                        <label for="floatingInput">Data de lançamento</label>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="description" id="inputs" cols="30" rows="5"></textarea>
                        <label for="floatingInput">Descrição</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"> 
                    <div class="form-group mb-3">
                        <label for="authors">Autor</label><br>
                            <select name="authors" id="inputs" class="col-lg-12">
                                <?  
                                    if ($option == 'editar'){
                                        echo "<option value='".  $dados['author_id'] ."' selected disabled>". $departaments[$dados['author_id']-1]['name'] ."</option><hr>" ;

                                        for ($i = 0; $i < $authors_num; $i++){
                                            echo "<option value='".  $authors[$i]['id'] ."'>". $authors[$i]['name'] ."</option>";
                                        }
                                    } else {
                                        echo "<option value='0' selected disabled>Selecione</option>";

                                        for ($i = 0; $i < $authors_num; $i++){
                                            echo "<option value='".  $authors[$i]['id'] ."'>". $authors[$i]['name'] ."</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <a href='#' data-bs-toggle="modal" data-bs-target="#authors">Adicionar Escritores</a> 
                    </div>
                </div>
                <div class="col-lg-6"> 
                    <div class="form-group mb-3">
                        <label for="categories">Categorias</label><br>
                            <select name="categories" id="inputs" class="col-lg-12">
                                <?  
                                    if ($option == 'editar'){
                                        echo "<option value='".  $dados['author_id'] ."' selected disabled>". $departaments[$dados['author_id']-1]['name'] ."</option><hr>" ;

                                        for ($i = 0; $i < $categories_num; $i++){
                                            echo "<option value='".  $categories[$i]['id'] ."'>". $categories[$i]['name'] ."</option>";
                                        }
                                    } else {
                                        echo "<option value='0' selected disabled>Selecione</option>";

                                        for ($i = 0; $i < $categories_num; $i++){
                                            echo "<option value='".  $categories[$i]['id'] ."'>". $categories[$i]['name'] ."</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <a href='#' data-bs-toggle="modal" data-bs-target="#categories">Adicionar Categorias</a> 
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

            <div class="mx-auto" style="width: 120px;">
                <button type="submit" class="btn btn_base success text-center">Registrar</button>
            </div>
            
        </div>             
    </form>

</body>

<!-- Modal -->

<!-- REGISTRO DE ESCRITORES -->
<div class="modal fade" id="authors" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Escritores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../model/books/cadastrar-autor.php" method="post" >
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputs" name="name" required>
                                <label for="floatingInput">Nome</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inputs" name="birthdate" required>
                                <label for="floatingInput">Data de Nacimento</label>
                            </div>
                            
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputs" name="description" cols="30" rows="5" required><? echo $dados['description'] ?></textarea>
                                <label for="floatingInput">Descrição</label>
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

<!-- REGISTRO DE CATEGORIAS -->
<div class="modal fade" id="categories" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categorias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../model/books/cadastrar-categoria.php" method="post" >
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputs" name="name" required>
                                <label for="floatingInput">Nome</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputs" name="description" cols="30" rows="5"><? echo $dados['description'] ?></textarea>
                                <label for="floatingInput">Descrição</label>
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