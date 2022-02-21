<?
$local = $_GET['page'];
$opcao = $_GET['option'];
$view = $_GET['view'];

$dashboard = loadPages('admin/dashboard');
$books = loadPages('admin/dashboard/books');
$readers = loadPages('admin/dashboard/readers');
$usuarios = loadPages('admin/users');

if ($local == 'funcionarios'){
    // Estrutura das Páginas
    if ($opcao == 'deletar'){
        require_once $usuarios['delet'];
    } 
    else if ($opcao == 'cadastrar' || $opcao == 'editar'){
        require_once $usuarios['form'];
    }

    else {
        //Carrega a Página para gestão de Funcionários
        require_once $usuarios['index'];
    }
}

else if  ($local == 'sair'){
    //Destroi a sessão e redireciona o usuário para o Index
    session_destroy();
    echo "<script>document.location='../../../index.php'</script>";
}

else {
    if ($opcao == 'cadastrar-livro'){
        require_once $books['form'];
    } 

    else if ($opcao == 'visualizar-livro' || $opcao == 'editar-livro'){
        require_once $books['view'];
    } 

    else if ($opcao == 'alugar-livro'){
        require_once $books['rend'];
    } 

    else if ($opcao == 'livros-alugados'){
        if ($view == 'devolvido'){
            require_once $readers['return'];
        } else {
            require_once $readers['rented'];
        }
    }

    else if ($opcao == 'livros-devolvidos'){
        require_once $readers['returned'];
    }

    else {
        //Carrega a Página Home do Admin
        require_once $dashboard['index'];
        require_once $books['cards'];
    }
    
}