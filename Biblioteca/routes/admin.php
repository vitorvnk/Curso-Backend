<?
$local = $_GET['page'];
$opcao = $_GET['option'];
$view = $_GET['view'];

$dashboard = loadPages('admin/dashboard');
$books = loadPages('admin/dashboard/books');
$readers = loadPages('admin/dashboard/readers');
$usuarios = loadPages('admin/users');


if ($local == 'funcionarios'){
    switch ($opcao) {
        case 'deletar':
            require_once $usuarios['delet'];
            break;

        case 'cadastrar' || 'editar':
            require_once $usuarios['form'];
            break;

        default:
            require_once $usuarios['index'];
            break;
    }
}

else if  ($local == 'sair'){
    //Destroi a sessão e redireciona o usuário para o Index
    session_destroy();
    echo "<script>document.location='../../../index.php'</script>";
}

else {
    switch ($opcao) {
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