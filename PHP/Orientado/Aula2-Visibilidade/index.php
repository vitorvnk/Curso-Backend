<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Documento</title>
    </head>
    <body>
        <?
            require_once 'Caneta.php';

            //Instanciando a Classe
            $c1 = new Caneta();

            // Definindo os atributos
            $c1->modelo = "BIC cristal";
            $c1->cor = "Azul";

            //Chamando métodos
            $c1->setPonta("0.5");
            $c1->setTampa(false);
            $c1->escrever();

            //Verificando o estado atual
            echo "<pre>";
            print_r($c1);
            echo "</pre>";
        ?>
    </body>
</html>