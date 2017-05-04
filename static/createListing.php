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
//Insert information into listings table in database
$sql1 = "INSERT INTO Listings (Address, City, State, Zip, NumBedrooms, NumBathrooms, Rent)".
		" VALUES ('$address', '$city', '$state', '$zipCode', $bedrooms, $bathrooms, $rent)";
mysqli_query($mysqli, $sql1);
//Change webpage to login page
header("Location: https://people.eecs.ku.edu/~whack48/EasyLease/Login.html");
$mysqli->close();
?>