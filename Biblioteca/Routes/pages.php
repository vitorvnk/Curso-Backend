<?
use Src\Utils\Utilities;

$place = $_GET['page'];
$option = $_GET['option'];

$file = Utilities::loadPages('home');
$book = Utilities::loadPages('home/books');

switch ($place) {
    case 'contato':
        require_once $file['contact'];
        break;

    case 'sobre':
        require_once $file['about'];
        break;
        
    default:
        if ($option == 'visualizar-livro'){
            require_once $book['view'];
        } else {
            require_once $file['home'];
            require_once $book['cards'];
        }
        break;
}
?>