<?

require_once "lobo.php";

class Cachorro extends Lobo{
    function emitirSom(){
        echo "<p>Au, Au</p>";
    }


    //NO PHP, A SOBRECARGA NÃO É FUNCIONA!
    /*function reagir($frase){

    }
    function reagir($h, $min){

    }*/

    function reagirFrase($frase){
        if ($frase == "comida") {
            echo "abanar e latir";
        } else { 
            echo "rosnar";
        }
    }
    function reagirHora($h){
        if ($h<18) {
            echo "abanar";
        } else {
            echo "ignorar";
        }
    }

}