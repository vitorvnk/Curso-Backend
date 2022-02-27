<?
    namespace Src\Model\Admin;
    use Src\Model\Manipulation;
    date_default_timezone_set('America/Sao_Paulo');
    
    
    class Departaments extends Manipulation{
        protected $sql;

        public function __construct($sql = null, $id = null) {
            parent::__construct();
            $this->setSql($sql, $id);
        }


        public function setSql($sql = null, $id = null) : self {            
            if ($sql == null){
                $this->sql = "SELECT * from departaments;";
            } else {
                $this->sql = $sql;
            }
            return $this;
        }
    }
