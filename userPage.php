<?php
	//Connect to mysql database
	error_reporting(E_ALL);
$mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
//TODO if the page is requested without a user GET variable, then return to home page
$user = $_GET["user"];

$query = "SELECT Firstname, Lastname, Profile_Information, Email, Phone1, Phone2 ".
		"FROM Users WHERE Username = '$user'";
		
if ($result = $mysqli->query($query)) {
	if ($row = $result->fetch_assoc()) {
		?>
		Owner: <?php
		echo $row["Firstname"].' '.$row["Lastname"];
		echo $row["Profile_Information"];
	}
}
?>