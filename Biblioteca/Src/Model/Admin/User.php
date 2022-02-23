<?
namespace Src\Model\Admin;
use Src\Model\Database;
date_default_timezone_set('America/Sao_Paulo');


class User{
    private $id;
    private $user;
    private $password;
    private $date;
    private $email;
    private $sql;
    private $employer_id;
    
    public function __construct($sql = null, $user = null){
        $this->setSql($sql, $user);
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
/*         echo "<pre>";
        print_r($this);
        echo "</pre>"; exit; */
        return (new Database())->execute($this->sql)->fetch(\PDO::FETCH_ASSOC);
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