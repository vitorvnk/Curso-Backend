<?
require_once 'video.php';
require_once 'gafanhoto.php';

class Visualizacao{
    private $espectador;
    private $filme;

	function __construct($espectador, $filme) {
        $this->espectador = $espectador;
        $this->filme = $filme;
        $this->filme->setViews($this->filme->getViews() + 1);
        $this->espectador->setTotAssistido($this->espectador->getTotAssistido() + 1);
	}

    public function avaliar(){
        $this->filme->setAvaliacao(5);
    }
    public function avaliarNota($nota){
        $this->filme->setAvaliacao($nota);
    }
    public function avaliarPorc($porc){
        $nota = 0;
        if ($porc <= 20) {
            $nova = 4;
        } else if ($porc <= 50){
            $nova = 5;
        } else if ($porc <= 90){
            $nova = 8;
        } else {
            $nova = 10;
        }
        $this->filme->setAvaliacao($nova);
    }







	/**
	 * 
	 * @return mixed
	 */
	function getEspectador() {
		return $this->espectador;
	}
	
	/**
	 * 
	 * @param mixed $espectador 
	 * @return Visualizacao
	 */
	function setEspectador($espectador): self {
		$this->espectador = $espectador;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getFilme() {
		return $this->filme;
	}
	
	/**
	 * 
	 * @param mixed $filme 
	 * @return Visualizacao
	 */
	function setFilme($filme): self {
		$this->filme = $filme;
		return $this;
	}
}