<?php

$dbname = "addressfinder";
$username = "root";
$password = "";

try {

    // Establish Connection

    $pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);

    // Test Dummy

    $sql = "INSERT INTO Users (firstname, lastname, street, city, country)
    VALUES ('John', 'Doe', '146 Oak St', 'Natick', 'Massachusetts')";

    $pdo->exec($sql);
} catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
}

// Push data from POST to table from index file

$sql = "INSERT INTO users (firstname, lastname, street, city, country) 
VALUES (:firstname, :lastname, :street, :city, :country)";

$pdoQuery = $pdo->prepare($sql);
$pdoQuery->bindParam(':firstname', $firstname);
$pdoQuery->bindParam(':lastname', $lastname);
$pdoQuery->bindParam(':street', $street);
$pdoQuery->bindParam(':city', $city);
$pdoQuery->bindParam(':country', $country);

$form = $_POST;
$firstname = $form['firstname'];
$lastname = $form['lastname'];
$street = $form['street'];
$city = $form['city'];
$country = $form['country'];

$result = $pdoQuery->execute();

if ($result) {
    echo "Data Sent";
    echo "<br><br>";

    // Show rows from DB

    $query = $pdo->prepare('SELECT * FROM users');
    $query->execute();

    $result = $query->fetchAll();
    print_r($result);
} else {
    echo "Failed to send";
}