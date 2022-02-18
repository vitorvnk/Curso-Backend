<?
use App\Model\Database;

$search = $_GET['search'] ?? null;

if (!$search){
    $sql = "select books.id, books.title, books.img, authors.name as author, authors.description, authors.birthdate, categories.name as category
        from books
        inner join authors
            on author_id = authors.id
        inner join categories
            on category_id = categories.id
        ORDER BY books.id DESC LIMIT 6;";
} else {
    $sql = "select books.id, books.title, books.img, authors.name as author, authors.description, authors.birthdate, categories.name as category
        from books
        inner join authors
            on author_id = authors.id
        inner join categories
            on category_id = categories.id
        WHERE books.`title` LIKE '%{$search}%' 
            ORDER BY books.id DESC LIMIT 6;";
}

$dados = (new Database('books'))->execute($sql)->fetchAll(PDO::FETCH_ASSOC);
$total = (new Database('books'))->execute($sql)->rowCount();

if ($total != 0) {
    echo "<div class='row row-cols-2 row-cols-lg-3 container' id='card'> ";
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
                            <a href='?page=home&option=visualizar-livro&id=". $dados[$i]['id']  ."'><button type='button' class='btn btn-sm btn-outline-secondary'>Detalhes</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }
    echo "</div>";
} else {
    echo "<p class='container mt-5'>Ops... Parece que ainda não há esse livro. Para voltar a tela inicial clique <a href='?search'>aqui</a>.</p>";
}
?>
