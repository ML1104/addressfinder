<?php

$dbname = "addressfinder";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli('localhost', $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare DB Table for form submission

$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    street VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Address Finder</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div id="content">
        <form action="insert.php" method="post">
            <div class="container">
                <div id="title">
                    <div id="titleText">User Details</div>
                </div>

                <div class="inputBlock">
                    <input type="text" name="firstname" id="name" required placeholder="First Name" />
                    <input type="text" name="lastname" id="lastname" required placeholder="Last Name" />
                </div class="inputField">

                <div class="inputBlock">
                    <input type="text" name="street" id="street" required placeholder="Street / Number" />
                </div>

                <div class="inputBlock">
                    <input type="text" name="city" id="city" required placeholder="City" />
                </div>

                <div class="inputBlock">
                    <input type="text" name="country" id="country" required placeholder="Country" />
                </div>

                <div class="inputBlock">
                    <button id="addUserButton">
                        <div>Add User</div>
                    </button>
                </div>
            </div>
        </form>

        <div id="mapContainer">
            <div id="map"></div>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=APIKEY&callback=initMap" async defer></script>
</body>

</html>