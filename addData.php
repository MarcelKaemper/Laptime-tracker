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
            $car_model = $_POST["model"];
            $car_brand = $_POST["brand"];
            $conn = new DBConnector();
            $conn->query("INSERT INTO car(model, brand) VALUES('$car_model', '$car_brand');");
            $conn->close();
            break;
            
        case 'track':
            $trackname = $_POST["trackname"];

            $conn = new DBConnector();
            $conn->query("INSERT INTO track(name) VALUES('$trackname');");
            $conn->close();
            break;

        case 'transmission':
            $transmission_type = $_POST["transmission"];

            $conn = new DBConnector();
            $conn->query("INSERT INTO transmission(type) VALUES('$transmission_type');");
            $conn->close();
            break;

        case 'laptime':
            $track = $_POST["track"];
            $game = $_POST["game"];
            $car = $_POST["car"];
            $transmission = $_POST["transmission"];
            $time = $_POST["time"];

            $conn = new DBConnector();
            $conn->query("INSERT INTO laptime(time, car_id, track_id, game_id, transmission_id) VALUES('$time', '$car', '$track', '$game', '$transmission');");
            $conn->close();
            break;
        
        default:
            # code...
            break;
    }
}

header("Location: /laptime");