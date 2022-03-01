<?
use Src\Utils\Utilities;

$status = $_GET['status'];

switch ($status) {
    // Erro genérico no banco de dados
    case "data_error":
        Utilities::status('danger', 'Erro no Banco.');
        break;

    // Usuários
    case "user_not-found":
        Utilities::status('danger', 'Usuário não encontrado');
        break;
    case "user_incorrect":
        Utilities::status('danger', 'Usuário incorreto.');
        break;
    case "user_password":
        Utilities::status('danger', 'Senha incorreta.');
        break; 
    case "user_success":
        Utilities::status('success', 'Usuário deletado.');
        break;


    // Cadastro de Funcionário
    case "func_error-emplo":
        Utilities::status('danger', 'Erro no cadastro de funcionário.');
        break;
    case "func_error-user":
        Utilities::status('danger', 'Erro no cadastro do usuário.');
        break;
    case "func_error-password":
        Utilities::status('danger', 'Senhas não coincidem.');
        break;
    case "func_success":
        Utilities::status('success', 'Usuário cadastrado com sucesso.');
        break;

    // Edição de Funcionário
    case "func_edit-success":
        Utilities::status('success', 'Usuário editado com sucesso.');
        break;
    case "func_edit-error_user":
        Utilities::status('danger', 'Senha incorreta.');
        break;
    case "func_edit-error_emplo":
        Utilities::status('danger', 'Erro ao editar funcionário.');
        break;



    //Cadastro de Livros
    case "book_success":
        Utilities::status('success', 'Livro cadastrado com sucesso.');
        break;
    case "book_error-file":
        Utilities::status('danger', 'Erro ao salvar o arquivo. Aparentemente  não tem permissão de escrita.');
        break;
    case "book_extension-error":
        Utilities::status('danger', 'Pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png.');
        break;
    case "book_not-file":
        Utilities::status('danger', 'Não enviou nenhum arquivo.');
        break;
    case "book_not-found":
        Utilities::status('danger', 'Livro não encontrado.');
        break;
    
    // Autor
    case "author_success":
        Utilities::status('success', 'Autor cadastrado com sucesso.');
        break;
    case "author_error":
        Utilities::status('danger', 'Erro ao cadastrar o autor.');
        break;

    //Categoria
    case "category_success":
        Utilities::status('success', 'Categoria cadastrada com sucesso.');
        break;
    case "category_error":
        Utilities::status('danger', 'Erro ao cadastrar a categoria.');
        break;

    //Excluir Livro
    case "book_delet":
        Utilities::status('success', 'Livro deletado com sucesso.');
        break;

    case "book_delet-error":
        Utilities::status('danger', 'Impossibilitado de deletar esse livro.');
        break;

    //Atualizar cadastro de Livros
    case "book_update_success":
        Utilities::status('success', 'Livro atualizado com sucesso.');
        break;

    // Leitor
    case "reader_success":
        Utilities::status('success', 'Leitor cadastrado com sucesso.');
        break;
    case "reader_error":
        Utilities::status('danger', 'Erro ao cadastrar o leitor.');
        break;

    // Aluguel
    case "rend_success":
        Utilities::status('success', 'Aluguel cadastrado com sucesso.');
        break;
    case "rend_error":
        Utilities::status('danger', 'Leitor já possui livro retirado.');
        break;

    case "return_book":
        Utilities::status('success', 'Devolução registrada com sucesso.');
        break;


/*     case " ":
        status('success', ' .');
        break;
*/
} 
?>