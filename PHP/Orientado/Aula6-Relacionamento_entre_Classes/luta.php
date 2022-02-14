<?
    require_once "./lutador.php";
class luta{
    private $desafiado;
    private $desafiante;
    private $rounds;
	private $aprovada;


	public function marcarLuta($l1, $l2){
		if ($l1->getCategoria() == $l2->getCategoria() && $l1->getNome() != $l2->getNome()){
			$this->setAprovada(true);
			$this->setDesafiado($l1);
			$this->setDesafiante($l2);
		} else {
			$this->setAprovada(false);
			$this->setDesafiado('null');
			$this->setDesafiante('null');
		}
	}

	public function lutar(){
		if ($this->getAprovada()){
			$this->getDesafiado()->apresentar();
			$this->getDesafiante()->apresentar();
			$vencedor = rand(0,2);

			switch ($vencedor) {
				case 0:
					echo "<b>Empatou</b>";
					$this->getDesafiante()->empatarLuta(1);
					$this->getDesafiado()->empatarLuta(1);
					break;
				case 1:
					echo "<b>Ganhou Desafiante</b>";
					$this->getDesafiante()->ganharLuta(1);
					$this->getDesafiado()->perderLuta(1);
					break;
				case 2:
					echo "<b>Ganhou Desafiado</b>";
					$this->getDesafiante()->perderLuta(1);
					$this->getDesafiado()->ganharLuta(1);
					break;
			}
			$this->getDesafiante()->status();
			$this->getDesafiado()->status();
			
		} else {
			echo "A luta não pode ocorrer";
		}

	}

















	/**
	 * 
	 * @return mixed
	 */
	function getDesafiado() {
		return $this->desafiado;
	}
	
	/**
	 * 
	 * @param mixed $desafiado 
	 * @return luta
	 */
	function setDesafiado($desafiado): self {
		$this->desafiado = $desafiado;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDesafiante() {
		return $this->desafiante;
	}
	
	/**
	 * 
	 * @param mixed $desafiante 
	 * @return luta
	 */
	function setDesafiante($desafiante): self {
		$this->desafiante = $desafiante;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getRounds() {
		return $this->rounds;
	}
	
	/**
	 * 
	 * @param mixed $rounds 
	 * @return luta
	 */
	function setRounds($rounds): self {
		$this->rounds = $rounds;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getAprovada() {
		return $this->aprovada;
	}
	
	/**
	 * 
	 * @param mixed $aprovada 
	 * @return luta
	 */
	function setAprovada($aprovada): self {
		$this->aprovada = $aprovada;
		return $this;
	}
}