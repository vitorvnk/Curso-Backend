<?

require_once "Pessoa.php";

class Funcionario extends Pessoa{
    private $setor;
    private $trabalhando;

    public function mudarTrabalho($trab){
        $this->setSetor($trab);
    }
	/**
	 * 
	 * @return mixed
	 */
	function getTrabalhando() {
		return $this->trabalhando;
	}
	
	/**
	 * 
	 * @param mixed $trabalhando 
	 * @return Funcionario
	 */
	function setTrabalhando(): self {
        if ($this->getTrabalhando == true){
            $this->trabalhando = false;
        } else {
            $this->trabalhando = true;
        }
		
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getSetor() {
		return $this->setor;
	}
	
	/**
	 * 
	 * @param mixed $setor 
	 * @return Funcionario
	 */
	function setSetor($setor): self {
		$this->setor = $setor;
		return $this;
	}
}