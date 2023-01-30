<?php
class UserService

//--------- Conexão ao Banco de Dados -------------//

{
    public $mysqli;

    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        -+include_once(INCLUDE_PATH . '/Core/connection.php');
        $this->mysqli = new Cnn([
            'host' => 'localhost',
            'username' => 'root',
            'password' => 3005,
            'database' => 'users',
            'port' => 3306
        ]);
    }


    //--------- Função de Read -------------//

    public function listUsers()
    {
        $query = 'SELECT * FROM users.users_table';
        $infoList = $this->mysqli->givenQuery($query);
        return $infoList;
    }

    //--------- Função de Create -------------//

    public function create_User($param)
    {
        if (empty($param['users_username']) || empty($param['users_email']) || empty($param['users_password'])) {
            return false;
        } else
            $createQuery = "INSERT INTO users.users_table (users_username, users_email, users_password) VALUES ( '" . $param['users_username'] . "','" . $param['users_email'] . "','" .  $param['users_password'] . "');";
        $this->mysqli->givenQuery($createQuery);
        $last_id = $this->mysqli->mysqli->insert_id;
        $selectQuery = "SELECT * FROM users.users_table WHERE users_id = '" . $last_id . "';";
        $result = $this->mysqli->givenQuery($selectQuery);
        return $result;
    }

    //--------- Função de Delete -------------//

    public function delete_User($param)
    {
        $deleteQuery = 'DELETE FROM users_table WHERE (users_id =' . $param['userid'] . ' );';
        $this->mysqli->givenQuery($deleteQuery);
        $rows = $this->mysqli->mysqli->affected_rows;
        return $rows;
    }


    //--------- Função de Edit -------------//

    public function edit_User($param)
    {

        if (empty($param['users_username']) || empty($param['users_email']) || empty($param['users_password'])) {
            return false;
        } else 
            $editQuery = "UPDATE users.users_table SET users_username = '" . $param['users_username'] . "', users_email = '" . $param['users_email'] . "', users_password = '" . $param['users_password'] . "' WHERE (users_id = '"  . $param['userid'] . "');";
            $this->mysqli->givenQuery($editQuery);
            $rows = $this->mysqli->mysqli->affected_rows;
            return $rows;
        
    }
}
