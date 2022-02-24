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
            $this->sql = "SELECT id, user, password
                FROM users
                {$this->user};";
        } else {
            $this->sql = $sql;
        }
        return $this;
    }

    private function defineUser($user) {
        $this->user = ($user == null) ? "" : "where user='$user'";
		return $this;
    }
    
}

?>