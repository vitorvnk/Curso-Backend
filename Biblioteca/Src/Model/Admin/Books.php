<?
namespace Src\Model\Admin;
use Src\Model\Database;

class Books{
    private $books;
    protected $search;
    protected $sql;
    protected $rows;
    protected $id;

    public function __construct($sql = null, $rows = '', $search = null, $id = null){
        $this->setSql($sql, $rows, $search, $id);
    }

    /**
     * Realiza a consulta no banco e retorna dados no formato de Array Estruturado
     *
     * @return mixed
     */
    public function getDataAll(){
        return (new Database())->execute($this->sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**
     * Realiza a consulta no banco e retorna no formato de Array Simples
     *
     * @return mixed
     */
    public function getData(){
        return (new Database())->execute($this->sql)->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Realiza consulta no banco e retorna o número de resultados
     *
     * @return int
     */
    public function getRowCount(){
        return (new Database())->execute($this->sql)->rowCount();
    }

    /**
     * Define o SQL a ser executado pelo Database
     * @param mixed $sql 
     * @return Books
     */
    function setSql($sql = null, $rows = '', $search = null, $id = null): self {
        $this->setId($id);
        $this->setRows($rows);
        $this->setSearch($search);
        
        if ($sql == null){
            $this->sql = "select books.id, books.title, books.img, authors.name as author, books.description, books.date, authors.birthdate, authors.description as inform , categories.name as category
            from books
                inner join authors
                    on author_id = authors.id
                inner join categories
                    on category_id = categories.id
                {$this->where}
                {$this->rows}
                {$this->id};";
        } else {
            $this->sql = $sql;
        }
        return $this;
    }
	/**
	 * 
	 * @param mixed $id 
	 * @return Books
	 */
	private function setId($id): self {
        $this->id = ($id == null) ? "" : "where books.id='$id'";
		return $this;
	}
	/**
	 * 
	 * @param mixed $search 
	 * @return Books
	 */
	private function setSearch($search): self {
        $this->search = ($search == null) ? "" : "WHERE books.`title` LIKE '%{$search}%'";
		return $this;
	}
	/**
	 * 
	 * @param mixed $rows 
	 * @return Books
	 */
	private function setRows($rows): self {
        $this->rows = ($rows == null) ? "" : "LIMIT $rows";
		return $this;
	}

}





?>