<?
namespace Src\Controller\Admin;
use Src\Model\Admin\Books;
use Src\Utils\Utilities;
date_default_timezone_set('America/Sao_Paulo');

class Book extends Books{
    protected $sql;
    protected $type;
    protected $place;
    protected $id;
    private $name;
    private $birthdate;
    private $description;
    private $title;
    private $date;
    private $authors;
    private $categories;
    private $imgOld;
    private $file;

    public function __construct($sql = null, $post = null, $file = null, $rows = null, $search = null, $id = null) {
        parent::__construct(null, $rows,$search, $id);
        $this->type = $post['type'] ?? null;
        $this->place = $post['place'] ?? null;
        $this->name = $post['name'] ?? null;
        $this->birthdate = $post['birthdate'] ?? null;
        $this->description = $post['description'] ?? null;
        $this->title = $post['title'] ?? null;
        $this->date = $post['date'] ?? null;
        $this->authors = $post['authors'] ?? null;
        $this->categories = $post['categories'] ?? null;
        $this->id = $post['id'] ?? null;
        $this->imgOld = $post['img_antiga'] ?? null;
        if ($file != null){$this->fileProcessor($file);}
    }

    public function insert(){
        switch ($this->type) {
            case 'cadastro-escritor':
                $sql = "INSERT INTO authors(`name`, `birthdate`, `description`) 
                    VALUES('{$this->name}', '{$this->birthdate}', '{$this->description}')";

                if($this->execute($sql)){Utilities::redirect('index.php?page=dashboard&option=cadastrar-livro&status=author_success');} else {Utilities::redirect('index.php?page=dashboard&option=cadastrar-livro&status=author_error');}
                break;

            case 'cadastro-categoria':
                $sql = "INSERT INTO categories(`name`, `description`) 
                    VALUES('{$this->name}', '{$this->description}')";

                if($this->execute($sql)){Utilities::redirect('index.php?page=dashboard&option=cadastrar-livro&status=category_success');} else {Utilities::redirect('index.php?page=dashboard&option=cadastrar-livro&status=category_error');}
                break;

            case 'cadastro-livro':
                $sql = "INSERT INTO books(`title`,`author_id`,`category_id`,`img`, `description`, `date`)
                    VALUES ('{$this->title}','{$this->authors}','{$this->categories}','{$this->file}', '{$this->description}', '{$this->date}');";

                if($this->execute($sql)){Utilities::redirect('index.php?page=dashboard&status=book_success');}
                break;
        }
    }

    public function editDelet(){
        switch ($this->type) {
            case 'deletar-livro':
                $sql1 = "DELETE FROM returned WHERE book_id = '{$this->id}'";
                $sql2 = "DELETE FROM books WHERE id = '{$this->id}'";

                if($this->execute($sql1) && $this->execute($sql2)){
                    unlink(".".$this->imgOld);
                    Utilities::redirect('index.php?page=dashboard&status=book_delet');
                } else {
                    Utilities::redirect("index.php?page=dashboard&option=visualizar-livro&status=book_delet-error&id={$this->id}");
                }

                break;

            case 'editar-livro':
                $sql = "UPDATE books SET 
                    `title` = '{$this->title}', 
                    `date` = '{$this->date}', 
                    `description` = '{$this->description}', 
                    `img` = '{$this->file}'
                WHERE (`id` = '{$this->id}')";

                if($this->execute($sql)){
                    unlink(".".$this->imgOld);
                    Utilities::redirect("index.php?page=dashboard&option=visualizar-livro&status=book_update_success&id={$this->id}");
                } else {
                    Utilities::redirect("index.php?page=dashboard&option=visualizar-livro&status=book_delet-error&id={$this->id}");
                }
                break;
        }
    }

    protected function fileProcessor($file){
        // Verifica a imagem enviada
        if ( isset( $file[ 'arquivo' ][ 'name' ] ) && $file[ 'arquivo' ][ 'error' ] == 0 ){
            // Coleta o nome do arquivo
            $arquivo_tmp = $file[ 'arquivo' ][ 'tmp_name' ];
            $nome = $file[ 'arquivo' ][ 'name' ];

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
                if (move_uploaded_file($arquivo_tmp, '.' . $destino)) {   
                    $this->file = $destino;         
                    return $this;
                }
                else {
                    // Erro ao salvar o arquivo. Aparentemente  não tem permissão de escrita.
                    Utilities::redirect("index.php?page=dashboard&option={$this->place}&status=book_error-file");exit;
                }
            }
            else {
                // Pode enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png
                Utilities::redirect("index.php?page=dashboard&option={$this->place}&status=book_extension-error");exit;
            }
        }
        else {
            if (is_null($this->imgOld)){
                // Não enviou nenhum arquivo!
                Utilities::redirect("index.php?page=dashboard&option={$this->place}&status=book_not-file");exit;
            }
            else {
                $this->file = $this->imgOld;
            }
        }
    }






















    public function getAuthorData() {
        $this->sql = 'SELECT * FROM authors';
        return $this->getDataAll();
    }

    public function getAuthorRow() {
        $this->sql = 'SELECT * FROM authors';
        return $this->getRowCount();
    }

    public function getCategoriesData() {
        $this->sql = 'SELECT * FROM categories';
        return $this->getDataAll();
    }

    public function getCategoriesRow() {
        $this->sql = 'SELECT * FROM categories';
        return $this->getRowCount();
    }
}
?>