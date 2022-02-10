<? 
require "../../model/banco.php";

$sql = "select ren.id, ren.date as 'emprestimo', return_date as 'devolucao', rea.name as 'nome', boo.title as 'livro', boo.img , user.user
    from rented_books ren
    inner join readers rea
        on reader_id = rea.id
    inner join books boo
        on book_id = boo.id
    inner join users user
        on user_id = user.id;";

$result_id = mysqli_query($conexao, $sql) or die("Erro no banco!");

// Pega o número de linhas resultantes
$total = mysqli_num_rows($result_id);

// Transforma o Result em array
$dados = mysqli_fetch_all($result_id, MYSQLI_ASSOC);

?>

<head>
    <title>Alugados | Biblio</title>
</head>

<body id="rented_book" class="mb-5">
    <div class="mb-4" >
            <h2 class="display-6">Alugados</h2>
            <a href="?page=dashboard">
                <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
            </a>
    </div>
        
    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Livro</th>
                <th>Nome</th>
                <th>Data do Empréstimo</th>
                <th>Data de Devolução</th>

                <th style="width:200px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?
            for($i = 0; $i < $total; $i++) {
                echo "
                    <tr>
                        <td><img src='../..".$dados[$i]['img']."'/></td>
                        <td>" . $dados[$i]['livro'] . "</td>
                        <td>" . $dados[$i]['nome'] . "</td>
                        <td>" . $dados[$i]['emprestimo'] . "</td>
                        <td>" . $dados[$i]['devolucao'] . "</td>

                        <td>
                            <a href='?page=dashboard&option=livros-alugados&view=devolvido&id=". $dados[$i]['id'] . "'>
                                <button type='button' class='btn btn_base success'>Devolver</button>
                            </a>
                        </td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
</body>