<?php

class Cnn
{

    public $mysqli;

    function __construct($credentials)

    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $this->mysqli = new mysqli($credentials['host'], $credentials['username'], $credentials['password'], $credentials['database'], $credentials['port']);
        } catch (Exception $exc) {
            echo 'Failed, the error is' . $exc;
        }
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }


    public function givenQuery($param)
    {
        if (str_contains($param, 'SELECT')) {
            $infoDb = [];
            $selectObj = $this->mysqli->query($param);
            while ($info = $selectObj->fetch_assoc()) {
                $infoDb[] = $info;
            }
            return $infoDb;
                    //Return fora do while, se não ele parará a função no primeiro loop e salvará somente a primeira linha. 
        } else {
            return $this->mysqli->query($param);
        }
    }
}
