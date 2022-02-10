<?
require "../banco.php";

// COLETA OS DADOS DO POST
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$img_antiga = $_POST['img_antiga'];
$id = $_POST['id'];
$img_enviada = '';


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
        $destino = '../../resources/templates/uploads/' . $novoNome;

        //Realiza o upload e move o arquivo ao local temporário
        if (move_uploaded_file($arquivo_tmp, $destino)) {    
            unlink("../../".$img_antiga);

            $img_enviada = '/resources/templates/uploads/' . $novoNome;

            header("Location: ../../controllers/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_update_success&id=$id");
        }
        else
            // Erro ao salvar o arquivo. Aparentemente  não tem permissão de escrita.
            header("Location: ../../controllers/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_error-file&id=$id");
        }
    else{
        // Pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png
        header("Location: ../../controllers/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_extension-error&id=$id");
    }
} else {
    //Caso não tenha imagem anexada
    $img_enviada = $img_antiga;
}


$sql = "UPDATE books SET 
`title` = '$title', 
`date` = '$date', 
`description` = '$description', 
`img` = '$img_enviada'
WHERE (`id` = '$id')";

mysqli_query($conexao, $sql);

header("Location: ../../controllers/admin/pages.php?page=dashboard&option=visualizar-livro&status=book_update_success&id=$id");