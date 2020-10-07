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
                <div class="form-group">
                    <input type="hidden" name="add-type" value="game">
                    <input type="text" class="form-control" placeholder="Enter game name" name="name">
                    <input type="submit" class="form-control" value="Submit">
                </div>
            </form>
            <form method="POST" action="index.php">
                <select size="15" name="game_id" id="selectGame" class="form-control">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM game ORDER BY name");
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
                <div class="form-group">
                    <input type="hidden" name="add-type" value="car">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter car brand" name="brand">
                        <input type="text" class="form-control" placeholder="Enter car model" name="model">
                    </div>
                    <div class="input-group">
                        <input type="submit" class="form-control" value="Submit">
                    </div>
                </div>
            </form>
            <form method="POST" action="index.php">
                <select name="car_id" size="15" id="selectCar" class="form-control">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM car ORDER BY brand");
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id"]."'>".$row["brand"]." ".$row["model"]."</option>\n";
                        }
                        $conn->close();
                    ?>
                </select>
            </form>
        </div>
        <div class="container">
            <h2>Track</h2>
            <form method="POST" action="addData.php">
                <div class="form-group">
                    <input type="hidden" name="add-type" value="track">
                    <input type="text" class="form-control" placeholder="Enter track name" name="trackname">
                    <input type="submit" class="form-control" value="Submit">
                </div>
            </form>
            <form method="POST" action="index.php">
                <select name="track_id" size="15" id="selectTrack" class="form-control">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM track ORDER BY name");
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
                <div class="form-group">
                    <input type="hidden" name="add-type" value="transmission">
                    <input type="text" class="form-control" placeholder="Enter transmission type" name="transmission">
                    <input type="submit" class="form-control" value="Submit">
                </div>
            </form>
            <form method="POST" action="index.php">
                <select name="transmission" size="15" id="selectTransmission" class="form-control">
                    <option value="-1"></option>
                    <?php
                        $conn = new DBConnector();
                        $result = $conn->query("SELECT * FROM transmission ORDER BY type");
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
        <div class="form-group row">
            <input type="text" class="form-control" placeholder="Enter laptime" name="laptime" id="inputTime">
            <input type="submit" class="form-control" value="Submit">
        </div>
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
    <form>
        <input type="button" class="form-control" value="Analyze and Visualize">
    </form>
    <form method="POST" action="generateDump.php">
        <input type="submit" class="form-control" value="Create DB-Dump">
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/cr-1.5.2/sp-1.2.0/sl-1.3.1/datatables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>