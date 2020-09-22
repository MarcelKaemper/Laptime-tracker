<?php
    require_once "DBConnector.php";
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

        </div>
        <div class="container">
            <h2>Car</h2>
        </div>
        <div class="container">
            <h2>Track</h2>
        </div>
        <div class="container">
            <h2>Laptime</h2>
        </div>
        <?php 
            $conn = new DBConnector();
            $result = $conn->query("SELECT * FROM car");
        ?>
    </div>
</body>
</html>