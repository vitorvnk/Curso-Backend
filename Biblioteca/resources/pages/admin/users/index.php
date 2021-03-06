<? 
use Src\Controller\Admin\User;

$conect = new User();

// Consulta no Banco de Dados
$dados = $conect->getDataAll();
$total = $conect->getRowCount();

?>


<head>
    <title>Funcionários | Biblio</title>
</head>


<body id="employess">
    <div class="mb-4">
        <h2 class="display-4">Funcionários</h2>
        <a href="?page=funcionarios&option=cadastrar">
            <button type="submit" class="btn btn_base primary">Cadastrar</button>    
        </a>
    </div>

    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th style="width:200px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?
            for($i = 0; $i < $total; $i++) {
                echo "
                    <tr>
                        <td>" . $dados[$i]['id'] . "</td>
                        <td>" . $dados[$i]['user'] . "</td>
                        <td>" . $dados[$i]['email'] . "</td>
                        <td>
                            <a href='?page=funcionarios&option=editar&id=". $dados[$i]['id'] . "'>
                                <button type='button' class='btn btn_base second'>Editar</button>
                            </a>
                            <a href='?page=funcionarios&option=deletar&id=". $dados[$i]['id'] . "'>
                                <button type='button' class='btn btn_base fail'>Excluir</button>
                            </a>
                        </td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
</body>