<?
require_once "Pessoa.php";

class Aluno extends Pessoa{
    private $matr;
    private $curso;

    public function cancelarMatr(){
        $this->setMatr(null);
        $this->setCurso(null);
        echo "Matricula Cancelada!";
    }

	public function pagarMensalidade() {
		echo "<p>Pagando a mensalidade do aluno: $this->nome </p>";
	}

	/**
	 * 
	 * @return mixed
	 */
	function getMatr() {
		return $this->matr;
	}
	
	/**
	 * 
	 * @param mixed $matr 
	 * @return Aluno
	 */
	function setMatr($matr): self {
		$this->matr = $matr;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCurso() {
		return $this->curso;
	}
	
	/**
	 * 
	 * @param mixed $curso 
	 * @return Aluno
	 */
	function setCurso($curso): self {
		$this->curso = $curso;
		return $this;
	}
}