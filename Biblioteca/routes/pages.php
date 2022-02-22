<?
$local = $_GET['page'];
$opcao = $_GET['option'];

$arquivo = loadPages('home');
$books = loadPages('home/books');

switch ($local) {
    case 'contato':
        require_once $arquivo['contact'];
        break;

    case 'sobre':
        require_once $arquivo['about'];
        break;
    
    default:
        if ($opcao == 'visualizar-livro'){
            require_once $books['view'];
        } else {
            require_once $arquivo['home'];
            require_once $books['cards'];
        }
        break;
}