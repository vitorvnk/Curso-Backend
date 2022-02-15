<?
require_once "acoes.php";


class Video implements Acoes{
    private $titulo;
    private $avaliacao;
    private $views;
    private $curtidas;
    private $reproduzindo;

	function __construct($titulo) {
        $this->titulo = $titulo;
        $this->avaliacao = 1;
        $this->views = 0;
        $this->curtidas = 0;
        $this->reproduzindo = false;
	}
    


    public function like(){
        $this->curtidas ++;
    }
    public function pause(){
        $this->reproduzindo = false;
    }
    public function play(){
        $this->reproduzindo = true;
    }
	/**
	 * 
	 * @return mixed
	 */
	function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 * 
	 * @param mixed $titulo 
	 * @return Video
	 */
	function setTitulo($titulo): self {
		$this->titulo = $titulo;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getAvaliacao() {
		return $this->avaliacao;
	}
	
	/**
	 * 
	 * @param mixed $avaliacao 
	 * @return Video
	 */
	function setAvaliacao($avaliacao): self {
        $media = ($this->avaliacao + $avaliacao) / $this->views;

		$this->avaliacao = $media;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getViews() {
		return $this->views;
	}
	
	/**
	 * 
	 * @param mixed $views 
	 * @return Video
	 */
	function setViews($views): self {
		$this->views = $views;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCurtidas() {
		return $this->curtidas;
	}
	
	/**
	 * 
	 * @param mixed $curtidas 
	 * @return Video
	 */
	function setCurtidas($curtidas): self {
		$this->curtidas = $curtidas;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getReproduzindo() {
		return $this->reproduzindo;
	}
	
	/**
	 * 
	 * @param mixed $reproduzindo 
	 * @return Video
	 */
	function setReproduzindo($reproduzindo): self {
		$this->reproduzindo = $reproduzindo;
		return $this;
	}

}