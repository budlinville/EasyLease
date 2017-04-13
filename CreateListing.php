<?php


//Connect to mysql database
$mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
        

//Get data from create listing page
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipCode = $_POST["zip_code"];
$bedrooms = $_POST["bedrooms"];
$bathrooms = $_POST["bathrooms"];
$rent = $_POST["rent"];
$picture1 = $_POST["pic1"];
$picture2 = $_POST["pic2"];
$picture3 = $_POST["pic3"];
$picture4 = $_POST["pic4"];
$picture5 = $_POST["pic5"];
$email = $_POST["email"];


//Insert information into listings table in database
$sql1 = "INSERT INTO Listings (address, city, state, zip, numBedrooms, numBathrooms, rent, pic1, pic2, pic3, pic4, pic5, email) VALUES ('$address', '$city', '$state', '$zipCode', '$bedrooms', '$bathrooms', '$rent', '$picture1', '$picture2', '$picture3', '$picture4', '$picture5', '$email')";

mysqli_query($mysqli, $sql1);




//Change webpage to login page
header("Location: https://people.eecs.ku.edu/~whack48/EasyLease/Login.html");

$mysqli->close();



?>
