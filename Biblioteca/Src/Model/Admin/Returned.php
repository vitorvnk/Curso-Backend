<?
    namespace Src\Model\Admin;
    use Src\Model\Manipulation;
    date_default_timezone_set('America/Sao_Paulo');
    
    
    class Returned extends Manipulation{
        protected $sqlId;
        protected $sql;

        public function __construct($sql = null, $id = null) {
            parent::__construct();
            $this->setSql($sql, $id);
        }
        
        public function setSql($sql = null, $id = null) : self {
            $this->defineId($id);
            
            if ($sql == null){
                $this->sql = "SELECT ret.id, ret.date as 'data', rea.name as 'nome', boo.title as 'livro', boo.img
                from returned ret
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
            $this->sqlId = ($id == null) ? "" : "where ret.id = '{$id}'";
            return $this;
        }
        
    }


?>