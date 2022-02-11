<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <title>Documento</title>
    </head>
    <body>
        <h1>Projeto Controle Remoto</h1><pre>
        <?
            require_once 'lutador.php';

            $lutadores = [];

            $lutadores[] = new lutador("Leon", "França", 32, 1.74, 68.9, 11, 3, 1);
            
            $lutadores[] = new lutador("Jose", "Portugal", 43, 1.90, 90, 13, 0, 9);

            $lutadores[] = new lutador("Pele", "Brasil", 19, 1.60, 60, 4, 9, 10);

            $lutadores[] = new lutador("Astolfo", "Japão", 20, 1.65, 50, 0, 0, 0);

            $lutadores[] = new lutador("Bucky", "USA", 40, 1.90, 110, 20, 10, 14);

            $lutadores[] = new lutador("Pedro", "Brasil", 19, 1.60, 40, 0,0,0);


            $lutadores[3]->apresentar();





            print_r($lutadores);

            

        ?>
    </pre></body>
</html>