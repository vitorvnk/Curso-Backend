<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Documento</title>
    </head>
    <body>
        <h1>Projeto Controle Remoto</h1>
        <?
            require_once 'controleRemoto.php';

            $c = new ControleRemoto();
            $c->ligar();
            $c->play();
            $c->abrirMenu();

            $c->pause();
            $c->ligarMudo();
            $c->abrirMenu();


            

        ?>
    </body>
</html>