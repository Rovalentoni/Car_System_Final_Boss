<?php

class Api
{

    //API é um arquivo / classe de rotas que retorna somente dados. Aqui instanciaremos as classes Services quando necessário e dessa forma extraíremos a informação do banco de dados.
    //Chamamos o serviço por aqui.


    //----------- Funções Gerais -----------//

    function __construct()
    {
        define('INCLUDE_PATH', __DIR__);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        session_start();

        if (!empty($_GET['f'])) {
            $api = $_GET['f'];
            $this->$api();
        };
    }

    public function login_Api()
    {
        include_once INCLUDE_PATH . '/Services/session_service.php';
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $session_Service = new SessionService;
        $user_Service = new UserService;
        $users = $user_Service->listUsers();
        if ($session_Service->login($_POST, $users) == true) {
            http_response_code(200);
        } else if ($session_Service->login($_POST, $users) == false) {
            http_response_code(400);
        };
    }

    public function logout()
    {
        include_once INCLUDE_PATH . '/Services/session_service.php';
        $session_Service = new SessionService;
        $session_Service->logout_User();
    }

    private function response_json($param)
    {
        header('content-Type: application/json');
        echo json_encode($param);
    }


    //---------------- Funções de Usuário -----------------//


    public function listUsers_Api()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $users = new UserService;
        $info = $users->listUsers();
        $this->response_json($info);

        // header('content-Type: application/json');
        // echo json_encode($info);

        //Ao colocar esse header, minha informação chega na api (response) como um "object Object". (Solution: Quando se coloca o header app/json, a chamada ajax já interpreta que 
        // a informação veio no formato JSON e portando não é necessário fazer o JSON.parse. O json retornado pela função de list já é convertido em um objeto javascript e está pronto
        // para ser usado. )
    }

    public function createUser_Api()
    {
        include_once './Services/user_service.php';
        $user_Service = new UserService;
        $create = $user_Service->create_User($_POST);
        if ($create == true) {
            http_response_code(201);
            $this->response_json($create);
        } else if ($create == false) {
            http_response_code(204);
        }
    }

    public function deleteUser_Api()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        $user_Service->delete_User($_POST);
        if ($user_Service->delete_User($_POST) === true) {
            http_response_code(200);
        }
    }

    public function editUser_Api()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        if ($user_Service->edit_User($_POST) == true) {
            http_response_code(200);
        } else if ($user_Service->edit_User($_POST) == false) {
            http_response_code(204);
        };
    }

    //---------------- Funções de Veículos -----------------//


    public function listCars_Api()
    {
        include_once './Services/cars_service.php';
        $carsService = new carsService;
        $info = $carsService->listCars();
        $this->response_json($info);
    }


    public function createCars_Api()
    {
        include_once './Services/cars_service.php';
        $carsService = new carsService;
        $create = $carsService->create_Car($_POST);
        if ($create === true) {
            http_response_code(201);
            $this->response_json($create);
        } else {
            http_response_code(204);
            $this->response_json($create);
        }
    }

    public function deleteCars_Api()
    {
        include_once './Services/cars_service.php';
        $carsService = new carsService;
        $carsService->delete_Car($_POST);
        http_response_code(200);
    }

    public function editCars_Api()
    {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        $carsService = new carsService;

        if ($carsService->edit_Car($_POST) == true) {
            http_response_code(200);
        } else if ($carsService->edit_Car($_POST) == false) {
            http_response_code(204);
            echo $_POST;
        }
    }
    //--------------- Funções Driver -------------//

    public function listDrivers_Api()
    {
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $infoDrivers = $driverService->list_Driver();
        $this->response_json($infoDrivers);
    }

    public function deleteDrivers_Api()
    {
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $driverService->delete_Driver($_POST);
    }

    public function createDrivers_Api()
    {
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $create = $driverService->create_Driver($_POST);
        if ($create == true) {
            http_response_code(201);
            $this->response_json($create);
        } else {
            http_response_code(204);
        }
    }

    public function editDrivers_Api(){
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $edit = $driverService->edit_Driver($_POST);
        if($edit == true) {
            http_response_code(200);
        } else if ($edit == false) {
            http_response_code(204);
        }
    }
}

new Api();
