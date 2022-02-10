<?
require __DIR__ . '/../controllers/functions.php';

$local = $_GET['page'];
$opcao = $_GET['option'];

$arquivo = loadPages('home');
$books = loadPages('home/books');

if ($local == 'contato'){
    require_once $arquivo['contact'];
} 

else if ($local == 'sobre'){
    require_once $arquivo['about'];
} 

else {
    if ($opcao == 'visualizar-livro'){
        require_once $books['view'];
    } else {
        require_once $arquivo['home'];
        require_once $books['cards'];
    }


}