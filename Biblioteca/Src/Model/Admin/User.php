<?
namespace Src\Model\Admin;
use Src\Model\Manipulation;
date_default_timezone_set('America/Sao_Paulo');


class User extends Manipulation{
    private $id;
    private $user;
    private $password;
    private $date;
    private $email;
    private $employer_id;
    protected $sql;
    
    public function __construct($sql = null, $user = null){
        parent::__construct();
        $this->setSql($sql, $user);
    }

    public function setSql($sql = null, $user = null): self {
        $this->defineUser($user);
        
        if ($sql == null){
<<<<<<< HEAD
            $this->sql = "SELECT us.id as 'user_id', em.id as 'employer_id', us.*, em.*
                from users as us
                inner join employees as em
                    on us.employer_id = em.id
                {$this->sqlUser}
                {$this->sqlId};";
=======
            $this->sql = "SELECT id, user, password
                FROM users
                {$this->user};";
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1
        } else {
            $this->sql = $sql;
        }
        return $this;
    }

    private function defineUser($user) {
<<<<<<< HEAD
        $this->sqlUser = ($user == null) ? "" : "where user='$user'";
		return $this;
    }
    private function defineId($id) {
        $this->sqlId = ($id == null) ? "" : "where em.id='$id'";
=======
        $this->user = ($user == null) ? "" : "where user='$user'";
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1
		return $this;
    }
    
}

?>