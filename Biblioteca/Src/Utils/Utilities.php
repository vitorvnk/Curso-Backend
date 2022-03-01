<?
    namespace Src\Utils;

    class Utilities{
        /**
         * Método que irá realizar o carregamento das Páginas
         *
         * @param  $dir
         * @return
         */
        public static function loadPages($dir){
            $types = array( '.php', '.html');
            $footer = \rootDir . '/resources/pages/' . $dir;
            $endDir = [];
        
            if(is_dir($footer)){
                $aux = dir($footer);
        
                while(($arq = $aux->read()) !== false){
                    //Remove a extensão do nome
                    $name = str_replace($types, "", $arq);
        
                    //Adiciona no vetor o endDir com extensão e o seu diretório
                    $endDir[$name] .= $footer . '/'. $arq;
                }
                $aux->close();
            }
        
            return $endDir;
        }
        
        /**
         * Personaliza o Alert do Bootstrap
         *
         * @param [type] $type
         * @param [type] $msm
         * @return void
         */
        public static function status($type, $msm){
            echo "
            <center> 
                <div class='alert alert-$type alert-dismissible fade show' role='alert' id='status'>
                    $msm
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </center>";
        
        }
        public static function redirect($url = null, $status = null){
            $http = $_SERVER['HTTP_REFERER'] ?? 'index.php';

            if (is_null($url)){
                $url = explode("&status", $http)[0];  
                $url .= "&status=$status";
            }

            echo "<script>document.location='$url'</script>"; 
        }
    }
?>



