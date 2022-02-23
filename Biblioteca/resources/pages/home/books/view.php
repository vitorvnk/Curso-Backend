<?
$id = $_GET['id'];

use Src\Model\Admin\Books;
$dados = (new Books(null, null, $search, $id))->getData();


if (!$dados) {
    echo "<script>document.location='?page=home'</script>";
}

?>

<section id="view_book" class="container">
    <div class="mb-4" >
            <h2 class="display-6">Detalhes</h2>
            <a href="?page=home">
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
        <div class="col">
            <div class="text-center">
                <img src='.<? echo $dados['img'] ?>'>
            </div>
        </div>
    </div>
</section>

