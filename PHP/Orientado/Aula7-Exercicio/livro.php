<?

require_once 'publicacao.php';
require_once 'pessoa.php';

class Livro implements Publicacao{
    private $titulo;
    private $autor;
    private $totPaginas;
    private $pagAtual;
    private $aberto;
    private $leitor;


	function __construct($titulo, $autor, $totPaginas, $leitor) {
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->totPaginas = $totPaginas;
            $this->leitor = $leitor->getNome();
	}


    public function detalhes() {
        echo "<br>O título do livro é: ". $this->getTitulo();
        echo "<br>Autor: ". $this->getAutor();
        echo "<br>Total de Páginas: ". $this->getTotPaginas();
        echo "<br>O livro está aberto? " . (($this->getAberto()) ? "SIM" : "NÃO");
        echo "<br>Página Atual: " . $this->getPagAtual();
        echo "<br>Está sendo lendo por: ". $this->leitor;
    }

	/**
	 *
	 * @return mixed
	 */
	function abrir() {
        if ($this->getAberto() == false){
            $this->setAberto(true);
            $this->setPagAtual(0);
        } else {
            echo "Livro já aberto";
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function fechar() {
        if ($this->getAberto() == true){
            $this->setPagAtual(0);
            $this->setAberto(false);
        } else {
            echo "Livro já fechado";
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function folhear($pag) {
        if (($this->getAberto() == true) && ($this->totPaginas >= $pag)) {
            $this->setPagAtual($this->getPagAtual() + $pag);
        } else {
            echo "Livro sem mais páginas";
        }
	}  
	
	/**
	 *
	 * @return mixed
	 */
	function avancarPag() {
        if (($this->getAberto() == true) && ($this->totPaginas >= $this->getPagAtual() + 1)){
            $this->setPagAtual($this->getPagAtual() + 1);
        } else {
            echo "Livro sem mais páginas";
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function voltarPag() {
        if (($this->getAberto() == true) && ($this->getPagAtual() > 0)){
            $this->setPagAtual($this->getPagAtual() - 1);
        } else {
            echo "Livro sem mais páginas";
        }
	}











        
	/**
	 * 
	 * @return mixed
	 */
	protected function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 * 
	 * @param mixed $titulo 
	 * @return Livro
	 */
	protected function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	/**
	 * 
	 * @return mixed
	 */
	protected function getAutor() {
		return $this->autor;
	}
	
	/**
	 * 
	 * @param mixed $autor 
	 * @return Livro
	 */
	protected function setAutor($autor) {
		$this->autor = $autor;
	}
	/**
	 * 
	 * @return mixed
	 */
	protected function getTotPaginas() {
		return $this->totPaginas;
	}
	
	/**
	 * 
	 * @param mixed $totPaginas 
	 * @return Livro
	 */
	protected function setTotPaginas($totPaginas) {
		$this->totPaginas = $totPaginas;
	}
	/**
	 * 
	 * @return mixed
	 */
	protected function getPagAtual() {
		return $this->pagAtual;
	}
	
	/**
	 * 
	 * @param mixed $pagAtual 
	 * @return Livro
	 */
	protected function setPagAtual($pagAtual) {
		$this->pagAtual = $pagAtual;
	}
	/**
	 * 
	 * @return mixed
	 */
	protected function getAberto() {
		return $this->aberto;
	}
	
	/**
	 * 
	 * @param mixed $aberto 
	 * @return Livro
	 */
	protected function setAberto($aber) {
		$this->aberto = $aber;
	}
	/**
	 * 
	 * @return mixed
	 */
	protected function getLeitor() {
		return $this->leitor;
	}
	
	/**
	 * 
	 * @param mixed $leitor 
	 * @return Livro
	 */
	protected function setLeitor($leitor) {
		$this->leitor = $leitor;
	}
}