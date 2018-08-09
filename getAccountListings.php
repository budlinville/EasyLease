<table>
<?php
/*
Written by Bud Linville and Weston Hack
Tested by Bud Linville and Weston Hack
Debugged by Bud Linville and Weston Hack

5/1/17
PHP script for user account age to get only 
their posted listings
*/

	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	$mysqli = new \mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");
	if ($mysqli->connect_errno) {
		printf("Error connecting to SQL server");
		exit();
	}
	
	
	
		$userName = $_COOKIE["user"];
		$query = "SELECT UserID FROM Users WHERE Username = '$userName'";
		if ($result = $mysqli->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$userID = $row["UserID"];
				
			}
		}
	$query = "SELECT Address, City, State, Zip, numBedrooms, numBathrooms, Rent ".
		"FROM Listings WHERE UserID = '$userID' ";
	
	$offset = (int) $_GET["offset"];
	//TODO get the user's preferences for number of rows returned, ORDER BY
	$query .= "LIMIT $offset,20";
	$rows = array();
	if ($result = $mysqli->query($query))
		while ($row = $result->fetch_assoc()) {	?>
<tr>
<?php		foreach ($row as $column) {	?>
<td>
<?php			echo $column ?>
</td>
<?php		}	?>
</tr>
<?php	}	?>
</table>
	<?php  $mysqli->close(); ?>