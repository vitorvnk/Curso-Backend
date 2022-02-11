<?
require_once 'controlador.php';

class lutador implements lutas{
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

	function __construct($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates) {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->setPeso($peso);
        $this->vitorias = $vitorias;
        $this->derrotas = $derrotas;
        $this->empates = $empates;
	}
	/**
	 *
	 * @return mixed
	 */
	function apresentar() {
        echo "<br>Lutador: " . $this->getNome();
        echo "<br>Origem: " . $this->getNacionalidade();
        echo "<br>" . $this->getIdade() . " anos";
        echo "<br>" . $this->getAltura() . "m de altura";
        echo "<br>Pesando: " . $this->getPeso() . "Kg";
        echo "<br>Ganhou: " . $this->getVitorias();
        echo "<br>Perdeu: " . $this->getDerrotas();
        echo "<br>Empatou: " . $this->getEmpates();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function status() {
        echo "<br>" . $this->getNome();
        echo "<br>Pesa: " . $this->getPeso() . "Kg";
        echo "<br>Ganhou: " . $this->getVitorias();
        echo "<br>Perdeu: " . $this->getDerrotas();
        echo "<br>Empatou: " . $this->getEmpates();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function ganharLuta() {
        $this->setVitorias($this->getVitorias() + 1);
	}
	
	/**
	 *
	 * @return mixed
	 */
	function perderLuta() {
        $this->setDerrotas($this->getDerrotas() + 1);
	}
	
	/**
	 *
	 * @return mixed
	 */
	function empatarLuta() {
        $this->setEmpates($this->getEmpates() + 1);
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
	 * @return lutador
	 */
	function setNome($nome): self {
		$this->nome = $nome;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getNacionalidade() {
		return $this->nacionalidade;
	}
	
	/**
	 * 
	 * @param mixed $nacionalidade 
	 * @return lutador
	 */
	function setNacionalidade($nacionalidade): self {
		$this->nacionalidade = $nacionalidade;
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
	 * @return lutador
	 */
	function setIdade($idade): self {
		$this->idade = $idade;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getAltura() {
		return $this->altura;
	}
	
	/**
	 * 
	 * @param mixed $altura 
	 * @return lutador
	 */
	function setAltura($altura): self {
		$this->altura = $altura;
		return $this;
	}
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
	 * @return lutador
	 */
	function setPeso($peso): self {
		$this->peso = $peso;
        $this->setCategoria($peso);
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCategoria() {
		return $this->categoria;
	}
	
	/**
	 * 
	 * @param mixed $categoria 
	 * @return lutador
	 */
	private function setCategoria($peso): self {
        if($peso < 52.2){
            $this->categoria = "Inválido";
        } else if ($peso <= 70.3){
            $this->categoria = "Leve";
        } else if ($peso < 83.9){
            $this->categoria = "Medio";
        } else if ($peso < 120.2) {
            $this->categoria = "Pesado";
        } else {
            $this->categoria = "Inválido";
        }
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getVitorias() {
		return $this->vitorias;
	}
	
	/**
	 * 
	 * @param mixed $vitorias 
	 * @return lutador
	 */
	function setVitorias($vitorias): self {
		$this->vitorias = $vitorias;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDerrotas() {
		return $this->derrotas;
	}
	
	/**
	 * 
	 * @param mixed $derrotas 
	 * @return lutador
	 */
	function setDerrotas($derrotas): self {
		$this->derrotas = $derrotas;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getEmpates() {
		return $this->empates;
	}
	
	/**
	 * 
	 * @param mixed $empates 
	 * @return lutador
	 */
	function setEmpates($empates): self {
		$this->empates = $empates;
		return $this;
	}

}