<?

abstract class Pessoa{
    protected $nome;
    protected $idade;
    protected $sexo;
    protected $experiencia;

	function __construct($nome, $idade, $sexo) {
	    $this->nome = $nome;
	    $this->idade = $idade;
	    $this->sexo = $sexo;
	    $this->experiencia = 0;
	}


    protected function ganhaExp($n){
        $this->experiencia += $n;
    }
 
	/**
	 * 
	 * @return mixed
	 */
	function getNome() {
		return $this->nome;
	}
	
	/**
	 * 
	 * @param mixed $nome 
	 * @return Pessoa
	 */
	function setNome($nome): self {
		$this->nome = $nome;
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
	 * @return Pessoa
	 */
	function setIdade($idade): self {
		$this->idade = $idade;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getSexo() {
		return $this->sexo;
	}
	
	/**
	 * 
	 * @param mixed $sexo 
	 * @return Pessoa
	 */
	function setSexo($sexo): self {
		$this->sexo = $sexo;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getExperiencia() {
		return $this->experiencia;
	}
	
	/**
	 * 
	 * @param mixed $experiencia 
	 * @return Pessoa
	 */
	function setExperiencia($experiencia): self {
		$this->experiencia = $experiencia;
		return $this;
	}
}