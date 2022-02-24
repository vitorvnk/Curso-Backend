<? 
use Src\Model\Admin\Returned;

$dados = (new Returned())->getDataAll();
$total = (new Returned())->getRowCount();

?>

<head>
    <title>Devolvidos | Biblio</title>
</head>

<body id="rented_book" class="mb-5">
    <div class="mb-4" >
        <h2 class="display-6">Devolvidos</h2>
        <a href="?page=dashboard">
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>
        
    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Livro</th>
                <th>Nome do Leitor</th>
                <th>Data da Devolução</th>
            </tr>
        </thead>
        <tbody>
            <?
            for($i = 0; $i < $total; $i++) {
                echo "
                    <tr>
                        <td><img src='.".$dados[$i]['img']."'/></td>
                        <td>" . $dados[$i]['livro'] . "</td>
                        <td>" . $dados[$i]['nome'] . "</td>
                        <td>" . date('d/m/Y - H:i', strtotime($dados[$i]['data'])) . "</td>
                    </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</body>