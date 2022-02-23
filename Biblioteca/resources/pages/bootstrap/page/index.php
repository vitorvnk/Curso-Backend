<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="resources/css/main.css" rel="stylesheet" type="text/css"  media="all" >
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                <div class="container-fluid">
                    <a href="?page" class="navbar-brand" id="img-navbar">
                        <img src="resources/templates/logo.png" alt="" class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div data-bs-offset="0" class="collapse navbar-collapse" id="navbarNav">
                        <ul class="justify-content-center navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="1" href="?page=home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=sobre">Quem Somos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=contato">Contato</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <a class="nav-link" href="?page=login">Entrar</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
        <div>
            <?php
                require_once \rootDir . '/Routes/pages.php';
            ?>
        </div>

        <div class="bg-dark text-white">
            <footer class="container py-5" id="footer">
                <div class="row">
                    <div class="col-12 col-md text-lg-center align-self-center" >
                        <ion-icon name="earth-outline" class="earth-footer" id="earth-footer"></ion-icon>
                        <small class="d-block mb-3 text-muted">&copy; 2022</small>
                    </div>

                    <div class="col-6 col-md">
                        <h5>INSTITUCIONAL</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="link-light" href="?page=contato">Fale Conosco</a></li>
                            <li><a class="link-light" href="?page=sobre">Quem Somos</a></li>
                            <li><a class="link-light" href="?page">Política de Privacidade</a></li>
                        </ul>
                        <a class="link-light" href="https://www.linkedin.com/in/vittorvk2/"><ion-icon name="logo-linkedin" size="large"></ion-icon></a>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>