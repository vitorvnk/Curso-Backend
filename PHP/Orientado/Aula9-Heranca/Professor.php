<?
require_once "Pessoa.php";

class Professor extends Pessoa{
    private $especialidade;
    private $salario;

    public function receberAum($value){
        $this->setSalario((($value/100) * $this->getSalario()) + $this->getSalario());
    }


	/**
	 * 
	 * @return mixed
	 */
	function getEspecialidade() {
		return $this->especialidade;
	}
	
	/**
	 * 
	 * @param mixed $especialidade 
	 * @return Professor
	 */
	function setEspecialidade($especialidade): self {
		$this->especialidade = $especialidade;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getSalario() {
		return $this->salario;
	}
	
	/**
	 * 
	 * @param mixed $salario 
	 * @return Professor
	 */
	function setSalario($salario): self {
		$this->salario = $salario;
		return $this;
	}
}