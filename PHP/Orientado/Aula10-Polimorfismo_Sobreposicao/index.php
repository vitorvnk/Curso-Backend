<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body><pre>
        <?
            require_once "Mamifero.php";
            require_once "Ave.php";
            require_once "Peixe.php";
            require_once "Repitil.php";
            require_once "Cachorro.php";
            require_once "Canguru.php";

            $m = new Mamifero("Preto");
            $a = new Ave("Rosa");
            $p = new Peixe("Cinza");
            $r = new Repitil("Preto");
            $c = new Cachorro("Caramelo");
            $can = new Canguru("Marrom");
            
            $m->setPeso(80);
            $a->setPeso(80);
            $p->setPeso(80);
            $r->setPeso(80);
            $c->setPeso(80);
            $can->setPeso(80);

            $m->alimentar();
            $a->alimentar();
            $p->alimentar();
            $r->alimentar();

            $c->abanarRabo();
            $c->enterrarOsso();

            $can->usarBolsa();
            $can->locomover();



        ?>
    </pre></body>
</html>