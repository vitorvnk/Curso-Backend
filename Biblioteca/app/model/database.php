<?
    namespace App\Model;
    use \PDO;
    use \PDOException;

    class Database{
    private static $host;
    private static $name;
    private static $user;
    private static $pass;
    private static $port;
    private $table;
    private $connection;

    public function __construct($table = null){
        self::$host = 'mysqldb';
        self::$name = 'biblioteca';
        self::$user = 'root';
        self::$pass = 'toor';
        self::$port = 3306;

        $this->table = $table;
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
     * Método responsável por realizar configurações no banco de dados
     */
    protected function setConfig(){
        date_default_timezone_set('America/Sao_Paulo');
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
}




















?>