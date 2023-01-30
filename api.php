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
        http_response_code(204);
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
        try {
            if ($create == false) {
                throw new Exception("Não é possível deixar nenhum dos campos em branco"); //Tenta (Try). Se esta condicional acontecer, temos uma exceção com a mensagem "x". Exception INTERROMPE tudo. 
                //Catch = 'Na exceção, salve o "objeto de exceção" na variável exc e depois faça a,b,c'//Pq o objeto? Pq exc pode ser usado com metodos no tipo exc->getmessage() exc->getfile(), etc. 
            }
            http_response_code(201);
            $this->response_json($create);
        } catch (Exception $exc) {
            http_response_code(404); //o sistema n vai retornar 500?
            echo ($exc->getMessage());
        }
    
        // if ($create != false) {
        //     http_response_code(201);
        //     $this->response_json($create);
        // } else if ($create == false) {
        //     http_response_code(204);
        // }
    }

    public function deleteUser_Api()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        $info = $user_Service->delete_User($_POST);
        try {
            if ($info === false || empty($info)) {
                throw new Exception("Nenhum usuário foi encontrado");
            }
            if ($info >= 1) {
                http_response_code(204);
            }
            echo (json_encode($info));
        } catch (Exception $exc) {
            http_response_code(404);
            echo ($exc->getMessage());
        }
    }

    public function editUser_Api()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        $info = $user_Service->edit_User($_POST);
        if ($info == false) {
            http_response_code(404);
        } else if ($info != false && $info >= 1) {
            http_response_code(204);
            // echo ($info);
        }
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
        try {
            if($create == false) {
                throw new Exception("Não é possível deixar nenhum dos campos em branco");
            }
            http_response_code(201);
            $this->response_json($create);
        } catch (Exception $exc) {
            http_response_code(404);
            echo $exc->getMessage();
        }

    }


    public function deleteCars_Api()
    {
        include_once './Services/cars_service.php';
        $carsService = new carsService;
        $info = $carsService->delete_Car($_POST);
        if($info == false){
            http_response_code(404);
        } else if ($info >= 1) {
            http_response_code(204);
            // echo ($info);
        }
        http_response_code(200);
    }

    public function editCars_Api()
    {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        $carsService = new carsService;

        // if ($carsService->edit_Car($_POST) == true) {
        //     http_response_code(200);
        // } else if ($carsService->edit_Car($_POST) == false) {
        //     http_response_code(204);
        //     echo $_POST;
        // }
        $info = $carsService->edit_Car($_POST);
        if ($info == false) {
            http_response_code(404);
        } else if ($info != false && $info >= 1) {
            http_response_code(204);
            // echo ($info);
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
        $info = $driverService->delete_Driver($_POST);
        if ($info == false) {
            http_response_code(404);
        } else if ($info != false && $info >= 1) {
            http_response_code(204);
            // echo ($info);
        }
    }

    public function createDrivers_Api()
    {
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $create = $driverService->create_Driver($_POST);
        // if ($create == true) {
        //     http_response_code(201);
        //     $this->response_json($create);
        // } else {
        //     http_response_code(204);
        // }
            try{
                if($create == false) {
                    throw new Exception("Não é possível deixar nenhum dos campos em branco");
                }
                http_response_code(201);
                $this->response_json($create);
            } catch (Exception $exc) {
                http_response_code(404);
                echo ($exc->getMessage());
            }

    }

    public function editDrivers_Api()
    {
        include_once './Services/drivers_service.php';
        $driverService = new driversService;
        $edit = $driverService->edit_Driver($_POST);
        if ($edit == false) {
            http_response_code(404);
        } else if ($edit != false && $info >= 1) {
            http_response_code(204);
            // echo ($info);
        }
    }
}

new Api();
