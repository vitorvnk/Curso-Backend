<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body><pre>
        <?
            //require_once "Pessoa.php";
            require_once "Aluno.php";
            require_once "Professor.php";
            require_once "Funcionario.php";
            require_once "Visitante.php";
            require_once "Bolsista.php";
            require_once "Tecnico.php";

            //$p1 = new Pessoa("Maria", 10, "F"); -> Não é possível instanciar uma classe Abstrata
            $p2 = new Aluno("Jose", 19, "M");
            $p3 = new Professor("Augusto", 30, "M");
            $p4 = new Funcionario("Leticia", 40, "F");
            $v1 = new Visitante("Maria", 10, "F");
            $b1 = new Bolsista("Alex", 20, "M");
            $t1 = new Tecnico("Astolfo", 19, "F");

            $p2->setMatr(323);
            $p2->setCurso("PHP");
            $p2->pagarMensalidade();

            $p3->setEspecialidade("Geografia");
            $p3->setSalario(1345);
            $p3->receberAum(30);
            $p3->fazerAniv();

            $p4->setIdade(20);
            $p4->setSetor("Secretaria");
            $p4->setTrabalhando();

            $b1->setMatr(3443);
            $b1->setCurso("HTML");
            $b1->setBolsa(80.5);
            $b1->renovarBolsa();
            $b1->pagarMensalidade();

            $t1->setMatr(3443);
            $t1->setCurso("HTML");
            $t1->pagarMensalidade();
            $t1->setRegistroProfissional(5454);
            $t1->praticar();


            //print_r($p1);
            print_r($p2);
            print_r($p3);
            print_r($p4);
            print_r($v1);
            print_r($b1);
            print_r($t1);

        ?>
    </pre></body>
</html>