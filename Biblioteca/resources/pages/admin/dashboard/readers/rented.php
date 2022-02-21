<? 
use App\Model\Database;

$sql = "select ren.id, ren.date as 'emprestimo' , return_date as 'devolucao', rea.name as 'nome', boo.title as 'livro', boo.img
    from rented_books ren
    inner join readers rea
        on reader_id = rea.id
    inner join books boo
        on book_id = boo.id
    order by return_date;";

$dados = (new Database())->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
$total = (new Database())->execute($sql)->rowCount();
$hoje = (new DateTime("now"))->format('Y-m-d');
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
                <th>Data para Devolução</th>

                <th style="width:200px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?
            for($i = 0; $i < $total; $i++) {
                //Processamento de data e colorização no front
                $returned = date('Y-m-d', strtotime($dados[$i]['devolucao']));
                $class_text = ( strtotime($returned) < strtotime($hoje)) ? "text-danger" : "text-success";

                echo "
                    <tr>
                        <td><img src='../../..".$dados[$i]['img']."'/></td>
                        <td>" . $dados[$i]['livro'] . "</td>
                        <td>" . $dados[$i]['nome'] . "</td> 
                        <td>" . date('d/m/Y', strtotime($dados[$i]['emprestimo'])) . "</td>
                        <td class='$class_text'>" . date('d/m/Y', strtotime($returned)) . "</td>

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