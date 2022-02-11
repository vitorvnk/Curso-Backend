<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Documento</title>
    </head>
    <body><pre>
        <?
            require_once 'Accont.php';

            //Instanciando a Classe
            $c1 = new Banco(123, "CC", "Vitor");
            $c2 = new Banco(213, "CD", "Alex");


            $c1->depositar(300);
            $c2->depositar(500);

            $c2->sacar(100);

            $c1->sacar(340);

            $c1->fecharConta();





            print_r($c1);
            print_r($c2);

        ?>
    </pre></body>
</html>