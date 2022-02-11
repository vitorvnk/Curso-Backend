<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
        <?
            require_once 'Caneta.php';

            //Instanciando a Classe
            $c1 = new Caneta();

            // Definindo os atributos
            $c1->modelo = "Normal";
            $c1->cor = "Azul";
            $c1->ponta = "0.5";
            $c1->carga = 90;
            $c1->tampada = true;

            //Verificando o estado atual
            echo "<pre>";
            print_r($c1);
            echo "</pre>";

            //Chamando o método
            $c1->rabiscar();

            //Chamando o método
            $c1->destampar();

            //Chamando o método
            $c1->rabiscar();

            //Criando outro objeto
            $c2 = new Caneta();

            // Definindo atributos
            $c2->modelo = "Normal";
            $c2->cor = "Vermelha";
            $c2->ponta = "1";
            $c2->carga = 40;
            $c2->tampada = false;

            //Verificando o estado atual
            echo "<pre>";
            print_r($c2);
            echo "</pre>";

        ?>
    </body>
</html>