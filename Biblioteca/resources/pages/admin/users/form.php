<? 
use Src\Model\Admin\Departaments;
use Src\Controller\Admin\User;
use Src\Model\Times;

$option = $_GET['option'];
$id = $_GET['id'];

$days_inst = new Times();
$departaments_inst = new Departaments();
$user = (new User(empty($_POST) ? null : $_POST, $id));

$hoje = $days_inst->today; 
$departaments = $departaments_inst->getDataAll();
$departaments_num = $departaments_inst->getRowCount();

// Caso a Opção seja de Editar um Funcionário já cadastrado
if ($option == 'editar'){
    $dados = $user->getData();
    $block = 'disabled';

    if (!empty($_POST)){$user->editDelet();}
} else {
    if (!empty($_POST)){$user->insert();}
}

?>

<head>
    <title>Formulários | Biblio</title>
</head>

<body id="form_employess" class="mb-5">
    <div class="mb-4" >
        <h2 class="display-6"><? echo ucfirst($option) ?></h2>
        <a href="?page=funcionarios">
            <button type="submit" class="btn btn_base dark"><ion-icon name="arrow-back-outline"></ion-icon></button>    
        </a>
    </div>

    <form method="post" class="text-black" action="?page=funcionarios&option=<?echo$option?>">
        <div>
            <div class="d-none">
                <input type="text" name="user_id" value="<? echo $dados['user_id'] ?>">
                <input type="text" name="employer_id" value="<? echo $dados['employer_id'] ?>">
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
                            <input type="text" class="form-control cpf" id="inputs" name="cpf" value="<? echo $dados['cpf'] ?>" required  <?echo$block?> >
                            <label for="floatingInput">CPF</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rg" id="inputs" name="rg" value="<? echo $dados['rg'] ?>" required  <?echo$block?> >
                            <label for="floatingInput">RG</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="inputs" name="birthdate" value="<? echo $dados['birthdate'] ?>" max="<?echo$hoje?>" required>
                            <label for="floatingInput">Data de Nascimento</label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-lg-6"> 
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control salary" id="inputs" name="salary" value="<? echo $dados['salary'] ?>" required>
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
                                        echo "<option value='". $dados['department_id'] ."' selected disabled>". $departaments[$dados['department_id']-1]['name'] ."</option><hr>" ;

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
                            <input type="text" class="form-control" id="inputs" name="user" value="<? echo $dados['user'] ?>" required  <?echo$block?> >
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
            <div class="row my-2">
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <textarea name="address" class="form-control" id="inputs"><? echo $dados['address'] ?></textarea>
                            <label for="floatingInput">Endereço</label>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row my-2" >
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputs" name="password" min="8" required>
                            <label for="floatingInput">Senha</label>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="inputs" name="password_confirm" min="8">
                            <label for="floatingInput"><?echo ($option == 'editar') ? "Nova Senha" : "Confirmar Senha" ?></label>
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
