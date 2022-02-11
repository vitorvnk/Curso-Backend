<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Documento</title>
    </head>
    <body>
        <?
            require_once 'Caneta.php';

            //Instanciando a Classe
            $c1 = new Caneta("Vermelho", "BIC");

            //Chamando métodos
            $c1->setPonta("0.5");

            //Verificando o estado atual
            echo "<pre>";
            print_r($c1);
            echo "</pre>";
        ?>
    </body>
</html>