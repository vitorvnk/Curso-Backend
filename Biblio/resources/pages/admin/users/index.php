<? 
require "../../model/banco.php";

// Consulta no Banco de Dados
$sql = "SELECT * from users;";

$result_id = mysqli_query($conexao, $sql) or die("Erro no banco!");

// Pega o número de linhas resultantes
$total = mysqli_num_rows($result_id);

// Transforma o Result em array
$dados = mysqli_fetch_all($result_id, MYSQLI_ASSOC);
?>



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