<?php
    require_once "DBConnector.php";

    function getTracksFromGame($game_id) {
        $conn = new DBConnector();
        $result = $conn->query('SELECT id, name FROM track_game tg JOIN track t ON tg.track_id=t.id WHERE game_id="'.$game_id.'";');
        $conn->close();
        return $result;
    }

    function getCarsFromGame($game_id) {
        $conn = new DBConnector();
        $result = $conn->query('SELECT id, car_brand, car_model FROM game_car gc JOIN car c ON gc.car_id=c.id WHERE game_id="'.$game_id.'";');
        $conn->close();
        return $result;
    }
?>