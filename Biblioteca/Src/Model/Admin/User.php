<?
namespace Src\Model\Admin;
use Src\Model\Manipulation;
date_default_timezone_set('America/Sao_Paulo');


class User extends Manipulation{
    private $id;
    private $sqlUser;
    private $sqlId;
    private $password;
    private $date;
    private $email;
    private $employer_id;
    protected $sql;
    
    public function __construct($sql = null, $user = null, $id = null){
        parent::__construct();
        $this->setSql($sql, $user, $id);
    }

    public function setSql($sql, $user, $id): self {
        $this->defineUser($user);
        $this->defineId($id);
        
        if ($sql == null){
            $this->sql = "SELECT us.id as 'user_id', em.id as 'employer_id', us.*, em.*
                from users as us
                inner join employees as em
                    on us.employer_id = em.id
                {$this->sqlUser}
                {$this->sqlId};";
        } else {
            $this->sql = $sql;
        }
        return $this;
    }

    private function defineUser($user) {
        $this->sqlUser = ($user == null) ? "" : "where user='$user'";
		return $this;
    }
    private function defineId($id) {
        $this->sqlId = ($id == null) ? "" : "where em.id='$id'";
		return $this;
    }
    
}

?>