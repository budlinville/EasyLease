<?php
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off

$mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//if(isset($_GET["numBedrooms"])) {
   $numBedrooms = $_POST["numBedrooms"];
//}

//if(isset($_GET["numBathrooms"])) {
   $numBathrooms = $_POST["numBathrooms"];
//}

//if(isset($_GET["rent"])) {
   $rent = $_POST["rent"];
//

//start session to store username for success.html
//session_start();
//$_SESSION['username'] = $username;

$query = "SELECT numBedrooms, numBathrooms, rent FROM Listings WHERE numBedrooms >= $numBedrooms AND numBathrooms >= $numBathrooms AND rent <= $rent";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
  		$fetchedNumBedrooms = $row["numBedrooms"];
  		$fetchedNumBathrooms = $row["numBathrooms"];
  		$fetchedRent = $row["rent"];

  		echo "$fetchedNumBedrooms<br>$fetchedNumBathrooms<br>";
  }
}
echo "Searching for rent less than $rent<br>";
//check login information
//if ($username = $fetchedUsername && password_verify($password, $fetchedPassword)) {
//	header("Location: https://people.eecs.ku.edu/~alinvill/Lab_5/Exercise3/success.html");}
//	else {
//	header("Location: https://people.eecs.ku.edu/~alinvill/Lab_5/Exercise3/login.html");
//}

$result->free();

/* close connection */
$mysqli->close();
?>
