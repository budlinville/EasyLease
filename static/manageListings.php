<?php
/*
Written by Ben Conner
Tested by Ben Conner
Debugged by Ben Conner

5/1/17
Allows user to manage his listings
*/

	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
    $mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");
	if ($mysqli->connect_errno) {
		printf("{}");
		exit();
	}
	
	if (!isset($_COOKIE["user"])) {
        echo "Please login!\n";
		die;
    }
    
	$userName = $_COOKIE["user"];
	$query = "SELECT UserID FROM Users WHERE Username = '$userName'";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$userID = $row["UserID"];
			
		}
	}
	
	$query = "SELECT Address, City, State, Zip, numBedrooms, numBathrooms, Rent FROM Listings ".
		"WHERE UserID = (SELECT UserID FROM Users WHERE Username = '$userName')";
	
	$json = array("rows"=>[]);
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$json["rows"][] = $row;
		}
	}
?>
