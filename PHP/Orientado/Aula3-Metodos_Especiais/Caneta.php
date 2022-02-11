<?
class Caneta{
    private $modelo;
    private $ponta;
    private $tampada;
    private $cor;

    public function __construct($cor, $modelo){ //Ou pode ter o mesmo nome da classe
        $this->cor = $cor;
        $this->modelo = $modelo;
        $this->tampar();
    }

    public function tampar(){
        $this->tampada = true;
    }


    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getPonta(){
        return $this->ponta;
    }

    public function setPonta($ponta){
        $this->ponta = $ponta;
    }
}
