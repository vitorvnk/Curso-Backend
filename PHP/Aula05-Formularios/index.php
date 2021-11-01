<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Um teste muito bom</title>
</head>
<body>
    <?php
        if(isset($_POST['acao'])){
            echo $_POST['conteudo'];
        } 

        if(isset($_POST['acao'])){
            echo $_FILES['arquivo']['name'];
        } 
    ?>

    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="arquivo">
        <br>
        <textarea name="conteudo"></textarea>
        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>