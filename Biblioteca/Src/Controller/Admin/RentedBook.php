<?
namespace Src\Controller\Admin;
use Src\Model\Admin\RentedBooks;
use Src\Utils\Utilities;
date_default_timezone_set('America/Sao_Paulo');


class RentedBook extends RentedBooks{
    protected $id;
    private $cpf;
    private $reader_id;
    private $book_id;
    private $user_id;
    private $return_date;


    public function __construct($sql = null, $post = null, $id = null) {
        parent::__construct(null, $id);
        $this->type = $post['type'] ?? null;
        $this->reader_id = $post['reader_id'] ?? null;
        $this->id = $id;
        $this->book_id = $post['book_id'] ?? null;
        $this->user_id = $post['user_id'] ?? null;
        $this->return_date = $post['return_date'] ?? null;

        $this->name = $post['name'] ?? null;
        $this->birthdate = $post['birthdate'] ?? null;
        $this->cpf = $post['cpf'] ?? null;
        $this->rg = $post['rg'] ?? null;
        $this->address = $post['address'] ?? null;
        $this->today = date('Y-m-d H:i:s');
    }

    public function insert(){
        switch ($this->type) {
            case 'cadastro-aluguel':
                if ($this->insertRented()) {Utilities::redirect("index.php?page=dashboard&option=alugar-livro&id={$this->book_id}&status=rend_success");} else {Utilities::redirect("index.php?page=dashboard&option=alugar-livro&id={$this->book_id}&status=rend_error");}
                break;
            case 'cadastro-leitor':
                if ($this->insertReader()) {Utilities::redirect("index.php?page=dashboard&option=alugar-livro&id={$this->book_id}&status=reader_success");} else {Utilities::redirect("index.php?page=dashboard&option=alugar-livro&id={$this->book_id}&status=reader_error");}
                break;
            case 'devolucao-aluguel':
                if ($this->returnBook()) {Utilities::redirect("index.php?page=dashboard&option=livros-alugados&status=return_book");}
                break;
        }
    }

    protected function insertRented(){
        $sql = "INSERT INTO rented_books(`date`, `return_date`, `reader_id`, `book_id`, `user_id`) 
            VALUES('{$this->today}', '{$this->return_date}', '{$this->reader_id}', '{$this->book_id}', '{$this->user_id}')";

        if($this->execute($sql)){ return true;} else {return false; }
    }

    protected function insertReader(){
        $sql = "INSERT INTO readers(`cpf`, `name`, `birthdate`, `address`, `rg`) 
        VALUES('{$this->cpf}', '{$this->name}', '{$this->birthdate}', '{$this->address}', '{$this->rg}')";

        if($this->execute($sql)){ return true;} else {return false; }
    }

    protected function returnBook(){
        $sql1 = "DELETE FROM rented_books WHERE id = '{$this->id}'";
        $sql2 = "INSERT INTO returned(`date`,`user_id`,`reader_id`,`book_id`)
            VALUES ('{$this->today}','{$this->user_id}','{$this->reader_id}','{$this->book_id}');";
        if ($this->execute($sql1) && $this->execute($sql2)){ return true;} else {return false; }
    }

}