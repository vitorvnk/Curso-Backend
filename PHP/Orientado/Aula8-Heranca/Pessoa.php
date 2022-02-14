<?

class Pessoa{
    private $nome;
    private $idade;
    private $sexo;

    public function fazerAniv(){
        $this->setIdade($this->getIdade() + 1);
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
	 * @param $nome mixed 
	 * @param $idade mixed 
	 * @param $sexo mixed 
	 */
	function __construct($nome, $idade, $sexo) {
	    $this->nome = $nome;
	    $this->idade = $idade;
	    $this->sexo = $sexo;
	}
}