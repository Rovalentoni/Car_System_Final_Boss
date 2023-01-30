<?php
class carsService

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
            'database' => 'cars',
            'port' => 3306
        ]);
    }

    //--------- Função de Read -------------//


    public function listCars()
    {
        $listCars = "SELECT * FROM cars_table;";
        $infoCars = $this->mysqli->givenQuery($listCars);
        return $infoCars;
    }

    //--------- Função de Create -------------//

    public function create_Car($param)
    {

        if (
            empty($param['placa']) || empty($param['marca']) || empty($param['modelo'])
            || empty($param['tipo']) || empty($param['ano']) || empty($param['cor'])
        ) {
            return false;
        } else {
            $createCars = "INSERT INTO cars.cars_table (cars_plate, cars_manufacturer, cars_model, cars_type, cars_year, cars_color)
             VALUES ( '" . $param['placa'] . "','" . $param['marca'] . "', '" . $param['modelo'] . "','" . $param['tipo'] . "','" . $param['ano'] . "','" . $param['cor'] . "');";
            $this->mysqli->givenQuery($createCars);
            $last_id = $this->mysqli->mysqli->insert_id;
            $selectQuery = "SELECT * FROM cars.cars_table WHERE cars_id = '" . $last_id . "';";
            $result = $this->mysqli->givenQuery($selectQuery);
            return $result;
        }
    }

    //--------- Função de Delete -------------//

    public function delete_Car($param)
    {
        $deleteQuery = "DELETE FROM cars.cars_table WHERE (cars_id = " . $param['carId'] . ");";
        print_r($deleteQuery);
        $this->mysqli->givenQuery($deleteQuery);
        $rows = $this->mysqli->mysqli->affected_rows;
        return $rows;
    }


    //--------- Função de Edit -------------//

    public function edit_Car($param)
    {
        $editQuery = "UPDATE cars.cars_table SET cars_plate = '" . $param['placa'] . "', cars_manufacturer = '" . $param['marca'] . "', cars_model = '" . $param['modelo'] .
            "', cars_type = '" . $param['tipo'] . "', cars_year = '" . $param['ano'] . "', cars_color = '" . $param['cor'] . "' WHERE ( cars_id = '" . $param['carId'] . "')";

        if (empty($param['placa']) || empty($param['marca']) || empty($param['modelo']) || empty($param['tipo']) || empty($param['ano']) || empty($param['cor'])) {
            return false;
        } else 
        $this->mysqli->givenQuery($editQuery);
        $rows = $this->mysqli->mysqli->affected_rows;
        return $rows;
    }
}
