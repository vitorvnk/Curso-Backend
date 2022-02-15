<?

require_once "animal.php";

class Mamifero extends Animal{
    protected $corPelo;

    public function emitirSom(){
        echo "<p>Som de Mamífero</p>";
    }
}