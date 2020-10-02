<?php
    require_once "DBConnector.php";
    require_once "getData.php";
?>
<html>
<head>
    <title>Laptime</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/cr-1.5.2/sp-1.2.0/sl-1.3.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            <form method="POST" action="index.php">
                <select size="10" name="game_id" id="selectGame">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM game");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["name"],"</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
            </form>
        </div>
        <div class="container">
            <h2>Car</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="car">
                <br>
                <br>
                <label for="brand">Car brand:</label>
                <input type="text" name="brand">
                <label for="model">Car model:</label>
                <input type="text" name="model">

                <input type="submit" value="Submit">
            </form>
            <form method="POST" action="index.php">
                <select name="car_id" size="10" id="selectCar">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM car");
                        while($row = $result->fetch_assoc()) {
                            echo "<option class='item' value='".$row["id"]."'>".$row["brand"]." ".$row["model"]."</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
            </form>
        </div>
        <div class="container">
            <h2>Track</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="track">
                <br>
                <br>
                <label for="trackname">Trackname:</label>
                <input type="text" name="trackname">

                <input type="submit" value="Submit">
            </form>
            <form method="POST" action="index.php">
                <select name="track_id" size="10" id="selectTrack">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM track");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["name"],"</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
            </form>
        </div>
        <div class="container">
            <h2>Transmission</h2>
            <form method="POST" action="addData.php">
                <input type="hidden" name="add-type" value="transmission">
                <br>
                <br>
                <label for="transmission">Transmission:</label>
                <input type="text" name="transmission">

                <input type="submit" value="Submit">
            </form>
            <form method="POST" action="index.php">
                <select name="transmission" size="10" id="selectTransmission">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM transmission");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["type"],"</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
            </form>
        </div>
    </div>
    <form action="addData" method="POST" id="addLaptimeForm">
            <label for="laptime">Laptime: </label>
            <input type="text" name="laptime" id="inputTime">
            <input type="submit" value="Submit">
    </form>
    <div id="table">
        <table id="dataTable" class="display border">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Car</th>
                    <th>Track</th>
                    <th>Transmission type</th>
                    <th>Laptime</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = new DBConnector();
                $result = $conn->query("SELECT * FROM laptime");
                while($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <?php
                                echo getRow("name", "game", $row["game_id"])[0];
                                ?>
                            </td>
                            <td>
                                <?php
                                $car_row = getRow("brand, model", "car", $row["car_id"]);
                                echo $car_row[0]." ".$car_row[1];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo getRow("name", "track", $row["track_id"])[0];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo getRow("type", "transmission", $row["transmission_id"])[0];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row["time"];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row["created_on"];
                                ?>
                            </td>
                        </tr>
                    <?php
                }
                $conn->close();
            ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/cr-1.5.2/sp-1.2.0/sl-1.3.1/datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>