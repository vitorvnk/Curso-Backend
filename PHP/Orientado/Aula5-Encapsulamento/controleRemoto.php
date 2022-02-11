<?

require_once 'Controlador.php';

class ControleRemoto implements Controlador{
    private $volume;
    private $ligado;
    private $tocando;

    public function __construct(){
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }


	/**
	 * 
	 * @return mixed
	 */
	private function getVolume() {
		return $this->volume;
	}
	
	/**
	 * 
	 * @param mixed $volume 
	 * @return ControleRemoto
	 */
	private function setVolume($volume): self {
		$this->volume = $volume;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	private function getLigado() {
		return $this->ligado;
	}
	
	/**
	 * 
	 * @param mixed $ligado 
	 * @return ControleRemoto
	 */
	private function setLigado($ligado): self {
		$this->ligado = $ligado;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	private function getTocando() {
		return $this->tocando;
	}
	
	/**
	 * 
	 * @param mixed $tocando 
	 * @return ControleRemoto
	 */
	private function setTocando($tocando): self {
		$this->tocando = $tocando;
		return $this;
	}
	/**
	 *
	 * @return mixed
	 */
	public function ligar() {
        $this->setLigado(true);
    }
	
	/**
	 *
	 * @return mixed
	 */
	public function desligar() {
        $this->setTocando(false);
        $this->setLigado(false);
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function abrirMenu() {
        echo "<br>Está Ligado? " . ($this->getLigado() ? "Sim" : "Não") . ".";
        echo "<br>Está Tocando? " . ($this->getTocando() ? "Sim" : "Não") . ".";
        echo "<br>Volume: " . $this->getVolume();
        for ($i=0; $i <= ($this->getVolume() /5 ); $i++) { 
            echo "|";
        }
        echo "<br>";
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function fecharMenu() {
        echo "Fechando menu...";
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function maisVolume() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() + 5);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function menosVolume() {
        if ($this->getLigado()) {
            $this->setVolume($this->getVolume() - 5);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function ligarMudo() {
        if ($this->getLigado() && $this->getVolume() > 0) {
            $this->setVolume(0);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function desligarMudo() {
        if ($this->getLigado() && $this->getVolume() == 0) {
            $this->setVolume(50);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function play() {
        if ($this->getLigado() && !($this->getTocando())){
            $this->setTocando(true);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function pause() {
        if ($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
	}
}