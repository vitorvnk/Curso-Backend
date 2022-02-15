<?

require_once "Animal.php";

class Repitil extends Animal{
    private $corEscama;

	function __construct($corEscama) {
        $this->corEscama = $corEscama;
	}

    function locomover() {
        echo "<p>Rastejando</p>";
	}
	

	function alimentar() {
        echo "<p>Comendo alguns vegetais</p>";
    }
	

	function emitirSom() {
        echo "<p>Som de répitil</p>";
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
	 * @return Repitil
	 */
	function setCorEscama($corEscama): self {
		$this->corEscama = $corEscama;
		return $this;
	}
}