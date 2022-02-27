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

        public function __construct($post = null, $id = null){
            $this->user = isset($post["user"]) ? trim($post["user"]) : FALSE;
            $this->password = isset($post["password"]) ? md5(trim($post["password"])) : FALSE;
            parent::__construct(null, $this->user, $id);


            $this->user_id = $post['user_id'];
            $this->employer_id = $post['employer_id'];
            $this->department_id_edit = $post['department_id_edit'];
            $this->name = $post['name'];
            $this->cpf = $post['cpf'];
            $this->rg = $post['rg'];
            $this->birthdate = $post['birthdate'];
            $this->salary = $post['salary'];
            $this->department = $post['department'];
            $this->user = $post['user'];
            $this->email = $post['email'];
            $this->password = $post['password'];
            $this->passwordConfirm = $post['password_confirm'];
            $this->address = $post['address'];
            



/*           [user_id] => 
            [employer_id] => 
            [department_id_edit] => 
            [name] => vitor
            [cpf] => 232323232323
            [rg] => 12344
            [birthdate] => 2022-02-07
            [salary] => 1223
            [department] => 2
            [user] => awd
            [email] => adwda@gmail.com
            [password] => 12345
            [password_confirm] => 12
            [address] => daw */












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

        public function insert(){
            echo "<pre>";
            print_r($this);
            echo "</pre>"; exit;
        }
    }

?>