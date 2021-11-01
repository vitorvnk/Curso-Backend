<?php
    namespace DankiCode\Controllers;

    class HomeController{
        public function index(){
            if(isset($_SESSION['login'])){
                //Renderizar a Home do usuário
                \DankiCode\Views\MainView::render('home');
            } else {
                //Renderizar para criar a conta
                \DankiCode\Views\MainView::render('login');
            }
        }
        
    }
?>