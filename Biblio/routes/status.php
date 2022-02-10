<?

$status = $_GET['status'];

switch ($status) {
    case "user_not-found":
        status('danger', 'Usuário não encontrado');
        break;
    case "user_incorrect":
        status('danger', 'Usuário incorreto.');
        break;
    case "user_password":
        status('danger', 'Senha incorreta.');
        break; 
    case "user_success":
        status('success', 'Usuário deletado.');
        break;


    // Cadastro de Funcionário
    case "func_error-emplo":
        status('danger', 'Erro no cadastro de funcionário.');
        break;
    case "func_error-user":
        status('danger', 'Erro no cadastro do usuário.');
        break;
    case "func_success":
        status('success', 'Usuário cadastrado com sucesso.');
        break;

    // Edição de Funcionário
    case "func_edit-success":
        status('success', 'Usuário editado com sucesso.');
        break;
    case "func_edit-error_user":
        status('danger', 'Erro ao editar usuário.');
        break;
    case "func_edit-error_emplo":
        status('danger', 'Erro ao editar funcionário.');
        break;



    //Cadastro de Livros
    case "book_success":
        status('success', 'Livro cadastrado com sucesso.');
        break;
    case "book_error-file":
        status('danger', 'Erro ao salvar o arquivo. Aparentemente  não tem permissão de escrita.');
        break;
    case "book_extension-error":
        status('danger', 'Pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png.');
        break;
    case "book_not-file":
        status('danger', 'Não enviou nenhum arquivo.');
        break;
    case "book_not-found":
        status('danger', 'Livro não encontrado.');
        break;
    
    // Autor
    case "author_success":
        status('success', 'Autor cadastrado com sucesso.');
        break;
    case "author_error":
        status('danger', 'Erro ao cadastrar o autor.');
        break;

    //Categoria
    case "category_success":
        status('success', 'Categoria cadastrada com sucesso.');
        break;
    case "category_error":
        status('danger', 'Erro ao cadastrar a categoria.');
        break;

    //Excluir Livro
    case "book_delet":
        status('success', 'Livro deletado com sucesso.');
        break;

    case "book_delet-error":
        status('danger', 'Impossibilitado de deletar esse livro.');
        break;

    //Atualizar cadastro de Livros
    case "book_update_success":
        status('success', 'Livro atualizado com sucesso.');
        break;

    // Leitor
    case "reader_success":
        status('success', 'Leitor cadastrado com sucesso.');
        break;
    case "reader_error":
        status('danger', 'Erro ao cadastrar o leitor.');
        break;

    // Aluguel
    case "rend_success":
        status('success', 'Aluguel cadastrado com sucesso.');
        break;
    case "rend_error":
        status('danger', 'Leitor já possui livro retirado ou não foi encontrado.');
        break;

    case "return_book":
        status('success', 'Devolução registrada com sucesso.');
        break;




    case " ":
        status('success', ' .');
        break;
    case " ":
        status('success', ' .');
        break;
}
