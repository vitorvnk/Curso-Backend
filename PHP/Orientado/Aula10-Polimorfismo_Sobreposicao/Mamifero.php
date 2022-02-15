<?

require_once "Animal.php";

class Mamifero extends Animal{
    private $corPelo;

	function __construct($corPelo) {
        $this->corPelo = $corPelo;
	}


	function locomover() {
        echo "<p>Correndo</p>";
	}
	

	function alimentar() {
        echo "<p>Mamando</p>";
    }
	

	function emitirSom() {
        echo "<p>Som de mamífero</p>";
    }

    
	/**
	 * 
	 * @return mixed
	 */
	function getCorPelo() {
		return $this->corPelo;
	}
	
	/**
	 * 
	 * @param mixed $corPelo 
	 * @return Mamifero
	 */
	function setCorPelo($corPelo): self {
		$this->corPelo = $corPelo;
		return $this;
	}

}