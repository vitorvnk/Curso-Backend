<?
    require('vendor/autoload.php');
    const rootDir = __DIR__;
    WilliamCosta\DotEnv\Environment::load(__DIR__);

    $place = $_GET['page'];

    if ( session_status() !== PHP_SESSION_ACTIVE ){
        session_start();
    }
    
    
    if ($place == 'login'){
        require \rootDir . ('/resources/pages/bootstrap/admin/login.php');
    } 
    else if (isset($_SESSION["id"]) && isset($_SESSION["user"])){
        require \rootDir . ('/resources/pages/bootstrap/admin/pages.php');
    }
    else {
        require \rootDir . ('/resources/pages/bootstrap/page/index.php');
    }



?>