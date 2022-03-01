<?
    namespace Src\Model\Admin;
    use Src\Model\Manipulation;
    date_default_timezone_set('America/Sao_Paulo');
    
    
    class Readers extends Manipulation{
        protected $id;
        private $cpf;
        private $name;
        private $rg;
        private $birthdate;
        private $address;
        protected $sql;
        
        
        public function __construct($sql = null, $cpf = null){
            parent::__construct();
            $this->setSql($sql, $cpf);
        }
        
        public function setSql($sql = null, $cpf = null) : self {
            $this->defineCpf($cpf);
            
            if ($sql == null){
                $this->sql = "SELECT `id`, `cpf`, `name`, `rg`, `birthdate` 
                    FROM readers
                    {$this->cpf};";
            } else {
                $this->sql = $sql;
            }
            return $this;
        }
    
        private function defineCpf($cpf) : self {
            $this->cpf = ($cpf == null) ? "" : "WHERE `cpf` = '{$cpf}'";
            return $this;
        }
        
    }
    
?>