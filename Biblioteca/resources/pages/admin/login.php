<?

<<<<<<< HEAD
use Src\Controller\Admin\User;

if (empty($_POST) != 1){
    (new User($_POST))->sessionStart();
}
=======
    if (empty($_POST) != 1){
        $conx = (new User($_POST))->sessionStart();
    }
>>>>>>> b6f2f968d3267736e9a38c4c0aaa53a4c4e816b1

?>


<head>
    <title>Login | Biblio</title>
</head>

<section class="mt-0" id="login">
    <div class="row  content">
        <div class="col-7"></div>
        
        <div class="col-5">
            <h2>Entrar</h2>

            <form method="post" action="?page=login">
                <div class="row">
                    <div class="form-group">
                        <label for="text">Usuário</label>
                        <input type="text" class="form-control" name="user" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control"name="password" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn">Enviar</button>
                </div>
            </form>
            
            <hr>

            <p>Caso não possua acesso, entre em contato com o seu gestor.</p>
        </div>
        
    </div>
</section>