<? 
require "../../model/banco.php";
$option = $_GET['option'];

// - Carrega todos os Departamentos Cadastrados -

// Consulta no Banco
$sql = "SELECT * from departaments;";
$result_id = mysqli_query($conexao, $sql);

// Pega o número de linhas resultantes
$departaments_num = mysqli_num_rows($result_id);

// Transforma o result em array
$departaments =  mysqli_fetch_all($result_id, MYSQLI_ASSOC);

// Caso a Opção seja de Editar um Funcionário já cadastrado
if ($option == 'editar'){
    $id = $_GET['id'];

    // Consulta os dados de User
    $sql = "SELECT * from users where id = $id;";
    $result_users = mysqli_query($conexao, $sql);
    
    // Transforma em Array
    $users =  mysqli_fetch_array($result_users, MYSQLI_ASSOC);

    // Verifica se há dados no Arrayx
    if (!$users){
        echo "<script>document.location='?page=funcionarios&status=user_not-found'</script>";
    } 

    // Consulta os dados de Employees
    $sql = "SELECT * from employees where id = " . $users['employer_id'] . "";
    $result_employees = mysqli_query($conexao, $sql);
    
    // Transforma em Array  
    $employees =  mysqli_fetch_array($result_employees, MYSQLI_ASSOC);
    
    // Une os arrays
    $dados = array_merge_recursive($users, $employees);
}
?>
<body id="form_employess" class="mb-5">
    <div class="mb-4" >
        <h2 class="display-6"><? echo ucfirst($option) ?></h2>
        <a href="?page=funcionarios">
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>

    <form method="post" class="text-black" action="../../model/users/<? echo $option ?>.php">
        <div>
            <div class="d-none">
                <input type="text" name="user_id" value="<? echo $dados['id'][0] ?>">
                <input type="text" name="employer_id" value="<? echo $dados['id'][1] ?>">
                <input type="text" name="department_id_edit" value="<? echo $dados['department_id'] ?>">
            </div>

            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="inputs" name="name"  value="<? echo $dados['name'] ?>" required>
                        <label for="floatingInput">Nome</label>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputs" name="cpf" value="<? echo $dados['cpf'] ?>" required>
                            <label for="floatingInput">CPF</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputs" name="rg" value="<? echo $dados['rg'] ?>" required>
                            <label for="floatingInput">RG</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="inputs" name="birthdate" value="<? echo $dados['birthdate'] ?>" required>
                            <label for="floatingInput">Data de Aniversário</label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-6"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="inputs" name="salary" value="<? echo $dados['salary'] ?>" required>
                            <label for="floatingInput">Salário</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6"> 
                    <div class="form-group">
                    <label for="department">Departamento</label><br>
                            <select name="department" id="inputs" class="col-lg-12">
                                
                                <?  
                                    if ($option == 'editar'){
                                        echo "<option value='".  $dados['department_id'] ."' selected disabled>". $departaments[$dados['department_id']-1]['name'] ."</option><hr>" ;

                                        for ($i = 0; $i < $departaments_num; $i++){
                                            echo "<option value='".  $departaments[$i]['id'] ."'>". $departaments[$i]['name'] ."</option>";
                                        }
                                    } else {
                                        echo "<option value='9999' selected disabled>Selecione</option>";

                                        for ($i = 0; $i < $departaments_num; $i++){
                                            echo "<option value='".  $departaments[$i]['id'] ."'>". $departaments[$i]['name'] ."</option>";
                                        }
                                    }

                                ?>
                            </select>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-lg-5"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputs" name="user" value="<? echo $dados['user'] ?>" required>
                            <label for="floatingInput">Usuário</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-7"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="inputs" name="email" value="<? echo $dados['email'] ?>" required>
                            <label for="floatingInput">E-mail</label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2" >
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputs" name="password" required>
                            <label for="floatingInput">Senha</label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputs" name="address" value="<? echo $dados['address'] ?>">
                            <label for="floatingInput">Endereço</label>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="mx-auto" style="width: 120px;">
                <button type="submit" class="btn btn_base success text-center"><? echo ucfirst($option) ?></button>
            </div>
            
        </div>             
    </form>
</body>
