<?
require_once "pessoa.php";


class Gafanhoto extends Pessoa{
    private $login;
    private $totAssistido;

    function __construct($nome, $idade, $sexo, $login) {
        parent::__construct($nome, $idade, $sexo);
        $this->login = $login;
	}
    
    public function viuMaisUm(){
        $this->totAssistido ++;
    }

	/**
	 * 
	 * @return mixed
	 */
	function getLogin() {
		return $this->login;
	}
	
	/**
	 * 
	 * @param mixed $login 
	 * @return Gafanhoto
	 */
	function setLogin($login): self {
		$this->login = $login;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getTotAssistido() {
		return $this->totAssistido;
	}
	
	/**
	 * 
	 * @param mixed $totAssistido 
	 * @return Gafanhoto
	 */
	function setTotAssistido($totAssistido): self {
		$this->totAssistido = $totAssistido;
		return $this;
	}
}