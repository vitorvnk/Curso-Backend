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

<<<<<<< HEAD
        public function __construct($post = null, $id = null){
            $this->user = !empty($post["user"]) ? trim($post["user"]) : null;
            $this->password = !empty($post["password"]) ? md5(trim($post["password"])) : null;
            $this->passwordConfirm = !empty($post["password_confirm"]) ? md5(trim($post["password_confirm"])) : null;
            $this->id = $post["id"] ?? null;
            $this->user_id = $post['user_id']  ?? null;
            $this->employer_id = $post['employer_id']  ?? null;
            $this->name = $post['name']  ?? null;
            $this->cpf = $post['cpf']  ?? null;
            $this->rg = $post['rg']  ?? null;
            $this->birthdate = $post['birthdate']  ?? null;
            $this->salary = $post['salary']  ?? null;
            $this->email = $post['email']  ?? null;
            $this->address = $post['address']  ?? null;
            $this->date = date('Y-m-d H:i:s')  ?? null;
            $this->type = $post['type']  ?? null;
            $this->department = $_POST['department'] ?? $_POST['department_id_edit'];
            parent::__construct(null, $this->user, $id);
=======
        public function __construct($post){
            $this->user = isset($post["user"]) ? trim($post["user"]) : FALSE;
            $this->password = isset($post["password"]) ? md5(trim($post["password"])) : FALSE;
            parent::__construct(null, $this->user);
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1
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
            return Utilities::redirect(null, 'password');
        }
        
        

<<<<<<< HEAD
        public function insert(){
            if (strcmp($this->password, $this->passwordConfirm)){
                Utilities::redirect(null, 'func_error-password');
            }

            $sql1 = "INSERT INTO employees(`cpf`, `rg`, `name`, `birthdate`, `address`, `salary`, `department_id`) 
            VALUES('{$this->cpf}', '{$this->rg}', '{$this->name}', '{$this->birthdate}', '{$this->address}', '{$this->salary}', '{$this->department}')";

            if ($this->execute($sql1)){
                $this->employer_id = $this->getLastID();

                $sql2 = "INSERT INTO users(`user`, `password`, `email`, `date`, `employer_id`) 
                    VALUES('{$this->user}', '{$this->password}', '{$this->email}', '{$this->date}', '{$this->employer_id}')";

                if ($this->execute($sql2)){ 
                    Utilities::redirect("index.php?page=funcionarios&status=func_success");
                    return true;
                } else { 
                    $sql = "DELETE FROM employees WHERE id = '{$this->employer_id}'"; $this->execute($sql);
                    Utilities::redirect(null, 'func_error-emplo');
                }
            } 
            Utilities::redirect(null, 'data_error');
        }

        public function editDelet(){
            $pass = $this->setSql(null, null, $this->employer_id)->getData()['password'];

            switch ($this->type) {
                case 'delete':
                    if ($this->delete($pass)) {Utilities::redirect("index.php?page=funcionarios&status=user_success");} else {Utilities::redirect(null, "user_password");}
                    break;
                
                default:
                    if ($this->edit($pass)) {Utilities::redirect(null, "func_edit-success");} else {Utilities::redirect(null, "func_edit-error_emplo");}
                    break;
            }
        }

        protected function delete($pass){
            if (!strcmp($pass, $this->password)) {
                $sql1 = "DELETE FROM employees WHERE id = '{$this->id}';";
                if ($this->execute($sql1)) { return true; } else { return false; }
            }
            return false; 
        }

        protected function edit($pass){
            if (!strcmp($this->password, $pass)){
                if (($pass != $this->passwordConfirm) && !is_null($this->passwordConfirm)){
                    $passEnd = $this->passwordConfirm;
                } else {
                    $passEnd = $this->password;
                }

                $sql1 = "UPDATE employees SET 
                `name` = '{$this->name}', 
                `birthdate` = '{$this->birthdate}', 
                `address` = '{$this->address}', 
                `salary` = '{$this->salary}', 
                `department_id` = '{$this->department}'
                WHERE (`id` = '{$this->employer_id}');";
            
                $sql2 = "UPDATE users SET
                `password` = '{$passEnd}', 
                `email` = '{$this->email}'
                WHERE (`id` = '{$this->user_id}');";
            
                if ($this->execute($sql1) && $this->execute($sql2)) { return true; }
            }
            return false; 
        }

=======

        
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1
    }

?>