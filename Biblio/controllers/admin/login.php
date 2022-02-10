<?php   
    $local = $_GET['page'];
    $status = $_GET['status'];

    require __DIR__ . '/../functions.php';
    
    $arquivo = loadPages('admin');
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../../resources/css/main.css" rel="stylesheet" type="text/css"  media="all" >
    </head>
    <body>

        <div class="container-fluid">
            <?php
                if ($status == 'password'){
                    status('danger', 'Senha incorreta.');
                } else if ($status == 'login') {
                    status('danger', 'Usuário incorreto.');
                }

                require_once $arquivo['login'];
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>