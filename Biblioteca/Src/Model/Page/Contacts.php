<?
    namespace Src\Model\Page;
    use Src\Model\Database;
    date_default_timezone_set('America/Sao_Paulo');

    class Contacts{
        private $name;
        private $topic;
        private $email;
        private $phone;
        private $description;
        private $date;
        private $sql;

        public function __construct($post){
            $this->name = $post['name'];
            $this->topic = $post['topic'];
            $this->email = $post['email'];
            $this->phone = $post['phone'];
            $this->description = $post['description'];
            $this->date = date('Y-m-d H:i:s');
        }

        public function insert(){
            $this->sql = "INSERT INTO contacts(`name`, `topic`, `email`, `phone`, `description`, `date`) 
                VALUES('{$this->name}', '{$this->topic}', '{$this->email}', '{$this->phone}', '{$this->description}', '{$this->date}')";

            return (new Database())->execute($this->sql);
        }
}
?>