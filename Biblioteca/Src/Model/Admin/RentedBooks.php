<?
    namespace Src\Model\Admin;
    use Src\Model\Manipulation;
    date_default_timezone_set('America/Sao_Paulo');
    
    
    class RentedBooks extends Manipulation{
        protected $sqlId;
        protected $sql;

        public function __construct($sql = null, $id = null) {
            parent::__construct();
            $this->setSql($sql, $id);
        }
        

        public function setSql($sql = null, $id = null) : self {
            $this->defineId($id);
            
            if ($sql == null){
                $this->sql = "SELECT ren.id as 'id', rea.id as 'reader_id' , boo.id as 'book_id' , ren.date as 'emprestimo', return_date as 'devolucao', rea.name as 'nome', rea.rg, rea.birthdate, boo.title as 'livro', boo.img
                    from rented_books ren
                    inner join readers rea
                        on reader_id = rea.id
                    inner join books boo
                        on book_id = boo.id
                    {$this->sqlId};";
            } else {
                $this->sql = $sql;
            }
            return $this;
        }
    
        private function defineId($id) : self {
            $this->sqlId = ($id == null) ? "order by return_date" : "where ren.id = '{$id}'";
            return $this;
        }
        
    }


?>