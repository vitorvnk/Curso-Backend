<?
class Caneta{
    public $modelo;
    public $cor;
    private $ponta;
    protected $carga;
    protected $tampada;

    public function escrever(){
        if ($this->tampada == true) {
            echo "<p>Não é possível escrevendo..</p>";
        } else {
            echo "<p>Estou escrevendo</p>";
        }
    }

    public function setTampa($tampa) {
        $this->tampada = $tampa;
    }

    public function getPonta(){
        return $this->ponta;
    }

    public function setPonta($ponta){
        $this->ponta = $ponta;
    }
}
