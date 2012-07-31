<?php
class MYSQLConnection implements Connection {
    // protected variables
    protected $user;
    protected $password;
    protected $database;
    protected $server;
    protected $connection;

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getHost() {
        return $this->server;
    }

    public function setServer($server) {
        $this->server = $server;
    }

    public function createConnection() {
        $connection = new mysqli_connect($server, $username, $password, $database); 

        if ($connection->connect_error) {
           throw new Exception('Database connection exception (' + $connection->connect_errno + ') : ' + $connection->connect_error); 
        }
    }

    public function closeConnection() {
        $connection->close();
    }
}
?>
