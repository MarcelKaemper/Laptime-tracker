<?php

require_once "DBConnector.php";

function getRow($row_name, $table_name, $row_id) {
    $conn = new DBConnector();
    $result = $conn->query("SELECT $row_name FROM $table_name WHERE id='$row_id'");
    return $result->fetch_row();
}

