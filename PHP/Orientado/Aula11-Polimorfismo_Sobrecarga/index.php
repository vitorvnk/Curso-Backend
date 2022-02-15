<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body><pre>
        <?
        require_once "mamifero.php";
        require_once "cachorro.php";

        $c = new Cachorro();
        $c->emitirSom();
        $c->reagirFrase("Comida");


        ?>
    </pre></body>
</html>