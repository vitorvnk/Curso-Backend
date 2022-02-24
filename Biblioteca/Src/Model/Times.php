<?
    namespace Src\Model;

    class Times extends \DateTime{
        private $date;
        public $today;
        public $limit;
    
        public function __construct(int $days = 30){
            parent::__construct('now', new \DateTimeZone('America/Sao_Paulo'));
            $this->today = parent::format('Y-m-d');
            $this->setInterval($days);
        }

        public function setInterval($days) : self{
            $this->limit = parent::add(new \DateInterval("P{$days}D"))->format('Y-m-d');
            return $this;
        }
    }


?>