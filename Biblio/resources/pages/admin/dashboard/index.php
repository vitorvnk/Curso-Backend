<?
    $dashboard = loadPages('admin/dashboard');
?>

<head>
    <title>Dashboard | Biblio</title>
</head>
<body>
    <div class="mb-4" id="dashboard">
        <h2 class="display-4">Dashboard</h2>
        <a href="?page=dashboard&option=cadastrar-livro">
            <button type="submit" class="btn btn_base primary">Cadastrar</button>    
        </a>
        <a href="?page=dashboard&option=livros-alugados">
            <button type="submit" class="btn btn_base second">Alugados</button>    
        </a>
    </div>

    <div>
        <form method="get">
            <div class="input-group mb-3" id="inputs">
                <input type="text" class="form-control" id="inputs" placeholder="Procurar livros" aria-describedby="search" name="search" autofocus>
                <button class="btn" type="submit" id="search"><ion-icon name="search-outline"></ion-icon></button>
            </div>
        </form>
    </div>
</body>
