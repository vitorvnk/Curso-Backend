<?
    namespace Src\Controller\Admin;
    use Src\Model\Admin\User as UserView;
    use Src\Utils\Utilities;
    date_default_timezone_set('America/Sao_Paulo');

    class User extends UserView{
        private $id;
        private $user;
        private $password;
        private $date;
        private $email;
        private $employer_id;
        private $files;

        public function __construct($post){
            $this->user = isset($post["user"]) ? trim($post["user"]) : FALSE;
            $this->password = isset($post["password"]) ? md5(trim($post["password"])) : FALSE;
            parent::__construct(null, $this->user);
        }


        /**
         * Método responsável por iniciar a sessão do usuário
         * @return void
         */
        public function sessionStart(){
            session_start();
            $this->files = parent::getData();

            if(!strcmp($this->password, $this->files["password"])){
                //Sessão autenticada, redirecionando o usuário
                $_SESSION["id"]= $this->files["id"];
                $_SESSION["user"] = $this->files["user"];
                return Utilities::redirect('index.php?');
            }
            return Utilities::redirect('index.php?page=login&status=password');
        }
        
        


        
    }

?>