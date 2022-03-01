<?
use Src\Model\Admin\Books;
$search = $_GET['search'] ?? null;
$conect = new Books(null, null, $search, null);

$dados = $conect->getDataAll();
$total = $conect->getRowCount();

if ($total != 0) {
    echo "<div class='row row-cols-2 row-cols-lg-3' id='card'> "; 
    for($i = 0; $i < $total; $i++) {
        echo "
            <div class='col mb-3'>
                <div class='card shadow-sm'>
                    <img class='bd-placeholder-img card-img-top' src='.". $dados[$i]['img']  ."' alt='". $dados[$i]['title']   ."' >
                    <div class='card-body'>
                        <p class='card-text fw-bold'>". $dados[$i]['title'] ."</p>
                        <small> <ion-icon name='person-circle-outline'></ion-icon> ". $dados[$i]['author']  ."</small> <br>
                        <small class='text-dark'> <ion-icon name='folder-open-outline'></ion-icon> ". $dados[$i]['category'] ."</small>
                        
                        <div class='d-flex justify-content-between align-items-center mt-3'>
                            <div class='btn-group'>
                                <a href='?page=dashboard&option=alugar-livro&id=". $dados[$i]['id']  ."'><button type='button' class='btn btn-sm btn-outline-secondary'>Alugar</button></a>
                                <a href='?page=dashboard&option=visualizar-livro&id=". $dados[$i]['id']  ."'><button type='button' class='btn btn-sm btn-outline-secondary'>Detalhes</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }
    echo "</div>";
} else {
    echo "Ops... Parece que ainda não há esse livro. Para voltar a tela inicial clique <a href='?search'>aqui</a>.";
}


?>
