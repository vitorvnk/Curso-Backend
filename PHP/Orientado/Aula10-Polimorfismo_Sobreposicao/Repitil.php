<?

require_once "Animal.php";

class Ave extends Animal{
    private $corPena;

	function __construct($corPena) {
        $this->corPena = $corPena;
	}

    public function fazerNinho(){
        echo "<p>Fazendo ninho</p>";
    }

    function locomover() {
        echo "<p>Voando</p>";
	}
	

	function alimentar() {
        echo "<p>Comendo frutas</p>";
    }
	

	function emitirSom() {
        echo "<p>Som da Ave</p>";
    }
	/**
	 * 
	 * @return mixed
	 */
	function getCorPena() {
		return $this->corPena;
	}
	
	/**
	 * 
	 * @param mixed $corPena 
	 * @return Ave
	 */
	function setCorPena($corPena): self {
		$this->corPena = $corPena;
		return $this;
	}
}