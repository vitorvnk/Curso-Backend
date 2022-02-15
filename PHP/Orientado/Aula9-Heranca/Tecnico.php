<?
require_once "Aluno.php";

class Tecnico extends Aluno {
    private $registroProfissional;

    public function praticar(){
        echo "<p>Praticando no registro profissional de número: $this->registroProfissional</p>";
    }


	/**
	 * 
	 * @return mixed
	 */
	function getRegistroProfissional() {
		return $this->registroProfissional;
	}
	
	/**
	 * 
	 * @param mixed $registroProfissional 
	 * @return Tecnico
	 */
	function setRegistroProfissional($registroProfissional): self {
		$this->registroProfissional = $registroProfissional;
		return $this;
	}
}