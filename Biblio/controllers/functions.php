<?php

function loadPages($dir){
    $types = array( '.php', '.html');
    $pasta = __DIR__ . '/../resources/pages/' . $dir;
    $arquivo = [];

    if(is_dir($pasta)){
        $diretorio = dir($pasta);

        while(($arq = $diretorio->read()) !== false){
            //Remove a extensão do nome
            $name = str_replace($types, "", $arq);

            //Adiciona no vetor o arquivo com extensão e o seu diretório
            $arquivo[$name] .= $pasta . '/'. $arq;
        }
        $diretorio->close();
    }

    return $arquivo;
}

function status($type, $msm){
    echo "
    <center> 
        <div class='alert alert-$type alert-dismissible fade show' role='alert' id='status'>
            $msm
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </center>
";

}


