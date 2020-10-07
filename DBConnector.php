<?php
require_once "credentials.php";
class DBConnector {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>