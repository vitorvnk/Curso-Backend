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
            require_once 'video.php';
            require_once 'gafanhoto.php';
            require_once 'visualizacao.php';

            
            $v[] = new Video("Curso PHP");
            $v[] = new Video("Curso HTML");

            $g[] = new Gafanhoto("Jose", 19, "M", 323);
            $g[] = new Gafanhoto("Peira", 43, "M", 453);

            $vis[] = new Visualizacao($g[0], $v[0]); // Um gafanhoto assistindo um vídeo
            $vis[] = new Visualizacao($g[0], $v[1]);

            $vis[0]->avaliar();
            $vis[1]->avaliarPorc(90);

            
            print_r($vis);
        ?>
    </pre></body>
</html>