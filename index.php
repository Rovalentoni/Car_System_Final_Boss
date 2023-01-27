<?php
class Router
{
    //--------- Comandos Iniciais -------------//

    function __construct()
    {
        define('INCLUDE_PATH', __DIR__);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        session_start();
        if (!empty($_GET['f'])) {
            $router = $_GET['f'];
            $this->$router();
        } else $this->loginForm();

        

        //Why should i use $this->list_Animals_Index instead of just list_Animals_Index()?
        /*A: Because inside the __construct, list_Animals_Index() doesn't exist. When i use "this", i'm 
        referring to the current class (Router) and therefore list_Animals_Index() is found. */


    }


    //--------- Função do formulário de Login -------------//

    function loginForm()
    {
        if (isset($_SESSION['login'])) {
            header('Location:/?f=mainHome');
        } else {
            include_once INCLUDE_PATH . '/Services/login.php';
        }
    }

    function mainHome()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/userhomepage.php';
        } else {
            header('Location:/?f=loginForm&try=2');
        }
    }

    //--------- Função da página Home (User) -------------//

    function userHomePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/userHomePage.php';
        } else {
            header('Location:/?f=loginForm&try=2');
        }
    }

    //--------- Função da página de Create (User) -------------//


    function userCreatePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/userCreatePage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Edit (User) -------------//


    function userEditPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/userEditPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Details (User) -------------//

    function userDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/userDetailsPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }


    //--------- Função de Home (Cars) -------------//

    function carsHomePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsHomePage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Create (Cars) -------------//

    function carsCreatePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsCreatePage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Details (Cars) -------------//

    function carsDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsDetailsPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Edit (Cars) -------------//

    function carsEditPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsEditPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }


    //--------- Função Home (Drivers) -------------//

    function driversHomePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Drivers/driversHomePage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função de detalhes (Drivers) -------------//

    function driversDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Drivers/driversDetailsPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Função de Criação (Drivers) -------------//

    function driversCreatePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Drivers/driversCreatePage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

            //--------- Função de Edição (Drivers) -------------//

    function driversEditPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Drivers/driversEditPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

}

new Router();
