<?
require "../../database.php";
use App\Model\Database;

// COLETA OS DADOS DO POST
$title = $_POST['title'];
$authors = $_POST['authors'];
$categories = $_POST['categories'];
$description = $_POST['description'];
$date = $_POST['date'];


// VERIFICA A IMAGEM ENVIADA E REALIZA O UPLOAD AO BANCO DE DADOS
if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
    // Coleta o nome do arquivo
    $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
    $nome = $_FILES[ 'arquivo' ][ 'name' ];

    // Coleta a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );

    // Permite apenas arquivos com extenções permitidas
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        $novoNome = uniqid ( time () ) . '.' . $extensao;

        //O local temporário onde o arquivo é enviado
        $destino = '/resources/templates/uploads/' . $novoNome;

        //Realiza o upload e move o arquivo ao local temporário
        if (move_uploaded_file($arquivo_tmp, '/../../../..'.$destino)) {            
            $sql = "INSERT INTO books(`title`,`author_id`,`category_id`,`img`, `description`, `date`)
            VALUES ('$title','$authors','$categories','$destino', '$description', '$date');";

            (new Database('books'))->execute($sql);

            header("Location: ../../../controller/admin/pages.php?page=dashboard&status=book_success");
        }
        else
            // Erro ao salvar o arquivo. Aparentemente  não tem permissão de escrita.
            header("Location: ../../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=book_error-file");
        }
    else
        // Pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png
        header("Location: ../../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=book_extension-error");
}
else
    // Não enviou nenhum arquivo!
    header("Location: ../../../controller/admin/pages.php?page=dashboard&option=cadastrar-livro&status=book_not-file");

