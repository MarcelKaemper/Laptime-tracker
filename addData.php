<?php
require_once("DBConnector.php");

if(isset($_POST["add-type"])) {
    switch ($_POST["add-type"]) {
        case 'game':
            $name = $_POST["name"];
            $conn = new DBConnector();
            $conn->query("INSERT INTO game(name) VALUES('$name');");
            $conn->close();
            break;

        case 'car':
            $game_id = $_POST["game_id"];
            $car_model = $_POST["car_model"];
            $car_brand = $_POST["car_brand"];
            $conn = new DBConnector();
            $conn->query("INSERT INTO car(car_model, car_brand) VALUES('$car_model', '$car_brand');");
            $car_id = $conn->getConnection()->insert_id;
            // Add relationship
            $conn->query("INSERT INTO game_car(game_id, car_id) VALUES('$game_id', '$car_id');");
            $conn->close();
            break;
            
        case 'track':
            $game_id = $_POST["game_id"];
            $trackname = $_POST["trackname"];

            $conn = new DBConnector();
            $conn->query("INSERT INTO track(name) VALUES('$trackname');");
            $track_id = $conn->getConnection()->insert_id;
            // Add relationship
            $conn->query("INSERT INTO track_game(game_id, track_id) VALUES('$game_id', '$track_id');");
            $conn->close();
            break;
        
        default:
            # code...
            break;
    }
}

header("Location: /laptime");