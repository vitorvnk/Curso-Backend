<?

require_once "Animal.php";

class Peixe extends Animal{

    private $corEscama;

	function __construct($corEscama) {
        $this->corEscama = $corEscama;
	}

    public function soltarBolha(){
        echo "<p>Bolha Bolha Bolha Bolha</p>";
    }

	function locomover() {
        echo "<p>Nadando</p>";
	}
	

	function alimentar() {
        echo "<p>Comendo substâncias</p>";
    }
	

	function emitirSom() {
        echo "<p>Não faz som</p>";
    }

	/**
	 * 
	 * @return mixed
	 */
	function getCorEscama() {
		return $this->corEscama;
	}
	
	/**
	 * 
	 * @param mixed $corEscama 
	 * @return Peixe
	 */
	function setCorEscama($corEscama): self {
		$this->corEscama = $corEscama;
		return $this;
	}
}