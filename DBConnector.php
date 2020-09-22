<?php
class DBConnector {
    private $host = "localhost";
    private $username = "laptime";
    private $password = "laptime";
    private $dbname = "laptime";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
?>