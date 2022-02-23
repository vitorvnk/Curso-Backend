<?
use Src\Utils\Utilities;

$place = $_GET['page'];
$option = $_GET['option'];
$view = $_GET['view'];


$dashboard = Utilities::loadPages('admin/dashboard');
$books = Utilities::loadPages('admin/dashboard/books');
$readers = Utilities::loadPages('admin/dashboard/readers');
$users = Utilities::loadPages('admin/users');


if ($place == 'funcionarios'){
    switch ($option) {
        case 'deletar':
            require_once $users['delet'];
            break;

        case 'cadastrar' || 'editar':
            require_once $users['form'];
            break;

        default:
            require_once $users['index'];
            break;
    }
}

else if  ($place == 'sair'){
    //Destroi a sessão e redireciona o usuário para o Index
    session_destroy();
    echo "<script>document.location='index.php'</script>";
}

else {
    switch ($option) {
        case 'cadastrar-livro':
            require_once $books['form'];
            break;

        case 'visualizar-livro':
            require_once $books['view'];
            break;

        case 'alugar-livro':
            require_once $books['rend'];
            break;

        case 'livros-alugados':
            if ($view == 'devolvido'){
                require_once $readers['return'];
            } else {
                require_once $readers['rented'];
            }
            break;

        case 'livros-devolvidos':
            require_once $readers['returned'];
            break;

        default:
            require_once $dashboard['index'];
            require_once $books['cards'];
            break;
    }
}

?>