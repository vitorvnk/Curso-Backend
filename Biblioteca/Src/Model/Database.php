<?
    namespace Src\Model;  
    use \PDO;
    use \PDOException;

    abstract class Database{
    private static $host;
    private static $name;
    private static $user;
    private static $pass;
    private static $port;
    protected $connection;

    protected function __construct(){
        self::$host = getenv('DB_HOST');
        self::$name = getenv('DB_NAME');
        self::$user = getenv('DB_USER');
        self::$pass = getenv('DB_PASS');
        self::$port = getenv('DB_PORT');
        $this->setConnection();
        $this->setConfig();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados por meio da interface PDO
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::$host.';dbname='.self::$name.';port='.self::$port,self::$user,self::$pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por realizar configurações
     */
    protected function setConfig(){
        date_default_timezone_set('America/Sao_Paulo');
    }

    /**
     * Método responsável por executar Query dentro do banco de dados
     */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
            //return;
        }
    }
    
    /**
     * Responsável por coletar o ID da última insersão na tabela
     *
     */ 
    public function getLastID(){
        return $this->connection->lastInsertId();
    }
}

?>