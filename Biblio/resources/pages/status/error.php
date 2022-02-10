<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../css/main.css" rel="stylesheet" type="text/css"  media="all" >

    <title>Opss</title>
</head>
<body onload="setTimeout(redirect, 4000)">
    <div class="mx-auto" id="error">
        <div class="position-absolute top-50 start-50 translate-middle">
            <ion-icon name="close-circle-outline"></ion-icon>
            <p>Desculpe! Ocorreu um erro interno.</p>
            <small>Redirecionando em 4 segundos.</small>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
    <script>
        function redirect(){
            window.location = "../../../index.php?page=contato";
        }
    </script>
</body>
</html>


