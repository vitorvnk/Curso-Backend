<?
    namespace Src\Model;

    class Times extends \DateTime{
        private $date;
        public $today;
        public $limit;
    
        public function __construct(){
            parent::__construct('now', new \DateTimeZone('America/Sao_Paulo'));
            $this->today = parent::format('Y-m-d');
            $this->limit = $this->setInterval()->format('Y-m-d');
        }

        public function setInterval($days = 30) : self{
            $this->limit = parent::add(new \DateInterval('P'.$days.'D'));
            return $this;
        }
    }


?>