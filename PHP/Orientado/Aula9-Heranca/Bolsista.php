<?

require_once "Aluno.php";

final class Bolsista extends Aluno{
    private $bolsa;

    public function renovarBolsa(){
        echo "<p>Bolsa renovada.</p>";
    } 

    public function pagarMensalidade(){
        echo "<p>Pagando bolsa com desconto de $this->bolsa% do aluno $this->nome </p>";
    }

	/**
	 * 
	 * @return mixed
	 */
	function getBolsa() {
		return $this->bolsa;
	}
	
	/**
	 * 
	 * @param mixed $bolsa 
	 * @return Bolsista
	 */
	function setBolsa($bolsa): self {
		$this->bolsa = $bolsa;
		return $this;
	}
}