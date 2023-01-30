<?php

class driversService

//--------- Conexão ao Banco de Dados -------------//

{

    public $mysqli;

    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        include_once(INCLUDE_PATH . '/Core/connection.php');
        $this->mysqli = new Cnn([
            'host' => 'localhost',
            'username' => 'root',
            'password' => 3005,
            'database' => 'test',
            'port' => 3306
        ]);
    }


    //--------- Função de Read -------------//

    public function list_Driver()
    {
        $readQuery = "SELECT * FROM drivers.drivers_table";
        return $this->mysqli->givenQuery($readQuery);
    }

    //--------- Função de Create -------------//

    public function create_Driver($param)
    {
        $createQuery = "INSERT INTO drivers.drivers_table (drivers_username, drivers_age, drivers_type, drivers_cnh, drivers_sex) VALUES ('" . $param['drivers_username'] . "','" .
            $param['drivers_age'] . "','" . $param['drivers_type'] . "','" . $param['drivers_cnh'] . "','" . $param['drivers_sex'] . "')";
        if (empty($param['drivers_username']) || empty($param['drivers_age']) || empty($param['drivers_type']) || empty($param['drivers_cnh']) || empty($param['drivers_sex'])) {
            return false;
        } else
            $this->mysqli->givenQuery($createQuery);
            $last_id = $this->mysqli->mysqli->insert_id;
            $selectQuery = "SELECT * FROM drivers.drivers_table WHERE drivers_id = '" . $last_id . "';";
            $info = $this->mysqli->givenQuery($selectQuery);
        return $info;
    }

    //--------- Função de Delete -------------//


    public function delete_Driver($param)
    {
        $deleteQuery = "DELETE FROM drivers.drivers_table WHERE (drivers_id = '" . $param['driverid'] . "');";
        $this->mysqli->givenQuery($deleteQuery);
        $rows = $this->mysqli->mysqli->affected_rows;
        return $rows;
    }

    //--------- Função de Edit -------------//


    public function edit_Driver($param)
    {

        $editQuery = "UPDATE drivers.drivers_table SET drivers_username = '" . $param['drivers_username'] . "', drivers_age = '" . $param['drivers_age'] . "', drivers_type = '" .
            $param['drivers_type'] . "', drivers_cnh = '" . $param['drivers_cnh'] . "', drivers_sex = '" . $param['drivers_sex'] . "' WHERE ( drivers_id = '" . $param['driverid'] . "');";

        if (empty($param['drivers_username']) || empty($param['drivers_age']) || empty($param['drivers_type']) || empty($param['drivers_cnh']) || empty($param['drivers_sex'])) {
            return false;
        } else
            $this->mysqli->givenQuery($editQuery);
            $rows = $this->mysqli->mysqli->affected_rows;
                 return $rows;
    }
}