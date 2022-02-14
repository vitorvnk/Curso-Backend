<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body><pre>
        <?
            require_once "livro.php";
            require_once "pessoa.php";

            $c1 = new Pessoa("Vitor", 20, "Masculino");

            $book1 = new Livro("As Pedras", "Astolfo", 10, $c1);

            $book1->abrir();
            $book1->voltarPag();

            $book1->detalhes();
        ?>
    </pre></body>
</html>