<?php
    require_once "DBConnector.php";
    require_once "relationLoader.php";
?>
<html>
<head>
    <title>Laptime</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-wrapper">
        <div class="container">
            <h2>Game</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="game">
                <label for="name">Gamename:</label>
                <input type="text" name="name">
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="container">
            <h2>Car</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="car">
                <select name="game_id">
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM game");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["name"],"</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
                <br>
                <br>
                <label for="car_brand">Car brand:</label>
                <input type="text" name="car_brand">
                <label for="car_model">Car model:</label>
                <input type="text" name="car_model">

                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="container">
            <h2>Track</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="track">
                <select name="game_id">
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM game");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["name"],"</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
                <br>
                <br>
                <label for="trackname">Trackname:</label>
                <input type="text" name="trackname">

                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="container">
            <h2>Laptime</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="laptime">
                <select name="game_id" id="finalGameSelector">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM game");
                        while($row = $result->fetch_assoc()) {
                            echo "<option ". ($_POST["selectedGame"]==$row["id"]?"selected='selected'":''). " value='".$row["id"]."'>".$row["name"]."</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
                <select name="track_id" id="finalTrackSelector">
                    <option value="-1"></option>
                    <?php
                        $result = getTracksFromGame($_POST["selectedGame"]);
                        while($row = $result->fetch_assoc()) {
                            echo "<option ". ($_POST["selectedTrack"]==$row["id"]?"selected='selected'":''). " value='".$row["id"]."'>".$row["name"],"</option>\n";
                        }
                    ?>
                </select>
                <select name="car_id" id="finalCarSelector">
                    <option value="-1"></option>
                    <?php
                        $result = getCarsFromGame($_POST["selectedGame"]);
                        while($row = $result->fetch_assoc()) {
                            echo "<option ". ($_POST["selectedCar"]==$row["id"]?"selected='selected'":''). " value='".$row["id"]."'>".$row["car_brand"]." ".$row["car_model"]."</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
                <br>
                <br>
                <input type="submit" value="Submit">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>