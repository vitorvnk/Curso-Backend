<?
namespace Src\Model;
use Src\Model\Database;

class Manipulation extends Database{
    public function __construct() {
        parent::__construct();
    }

    /**
     * Realiza a consulta no banco e retorna dados no formato de Array Estruturado
     *
     * @return mixed
     */
    public function getDataAll(){
        return $this->execute($this->sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**
     * Realiza a consulta no banco e retorna no formato de Array Simples
     *
     * @return mixed
     */
    public function getData(){
        return $this->execute($this->sql)->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Realiza a contagem de todas as linhas retornadas da Query
     *
     * @return int
     */
    public function getRowCount(){
        return $this->execute($this->sql)->rowCount();
    }

}
?>