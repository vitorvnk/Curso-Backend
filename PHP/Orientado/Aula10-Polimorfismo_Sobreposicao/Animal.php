<?

abstract class Animal{
    protected $peso;
    protected $idade;
    protected $membros;

    abstract public function locomover();
    abstract public function alimentar();
    abstract public function emitirSom();
	/**
	 * 
	 * @return mixed
	 */
	function getPeso() {
		return $this->peso;
	}
	
	/**
	 * 
	 * @param mixed $peso 
	 * @return Animal
	 */
	function setPeso($peso): self {
		$this->peso = $peso;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getIdade() {
		return $this->idade;
	}
	
	/**
	 * 
	 * @param mixed $idade 
	 * @return Animal
	 */
	function setIdade($idade): self {
		$this->idade = $idade;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getMembros() {
		return $this->membros;
	}
	
	/**
	 * 
	 * @param mixed $membros 
	 * @return Animal
	 */
	function setMembros($membros): self {
		$this->membros = $membros;
		return $this;
	}
}