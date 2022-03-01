<? 
use Src\Model\Admin\RentedBooks;
use Src\Model\Times;

<<<<<<< HEAD
$conect = new RentedBook();
$days = new Times();

$dados = $conect->getDataAll();
$total = $conect->getRowCount();
$hoje = $days->today;
=======
$dados = (new RentedBooks())->getDataAll();
$total = (new RentedBooks())->getRowCount();
$hoje = (new Times())->today;
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1

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
                        <td><img src='.".$dados[$i]['img']."'/></td>
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