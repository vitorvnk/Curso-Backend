<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body><pre>
        <?
            require_once "Pessoa.php";
            require_once "Aluno.php";
            require_once "Professor.php";
            require_once "Funcionario.php";

            $p1 = new Pessoa("Maria", 10, "F"); 
            $p2 = new Aluno("Jose", 19, "M");
            $p3 = new Professor("Augusto", 30, "M");
            $p4 = new Funcionario("Leticia", 40, "F");

            $p2->setMatr(323);
            $p2->setCurso("PHP");

            $p3->setEspecialidade("Geografia");
            $p3->setSalario(1345);
            $p3->receberAum(30);
            $p3->fazerAniv();

            $p4->setIdade(20);
            $p4->setSetor("Secretaria");
            $p4->setTrabalhando();

            print_r($p1);
            print_r($p2);
            print_r($p3);
            print_r($p4);

        ?>
    </pre></body>
</html>