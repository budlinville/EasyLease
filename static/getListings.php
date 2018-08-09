<table>
<?php
/*
Written by Ben Conner
Tested by Ben Conner
Debugged by Ben Conner

5/1/17
returns listings that match specified numBedrooms, numBathrooms, rent paramaters
*/

	/*ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	*/
	$mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");
	if ($mysqli->connect_errno) {
		printf("Error connecting to SQL server");
		exit();
	}
	$query = "SELECT Address, City, State, Zip, numBedrooms, numBathrooms, Rent, Username ".
		"FROM Listings INNER JOIN Users ON (Listings.UserID = Users.UserID) WHERE TRUE ";
	if ($numBedrooms = $_GET["numBedrooms"])
		$query .= "AND numBedrooms >= $numBedrooms ";
	if ($numBathrooms = $_GET["numBathrooms"])
		$query .= "AND numBathrooms >= $numBathrooms ";
	if ($rent = $_GET["rent"])
		$query .= "AND Rent <= $rent ";
	$offset = (int) $_GET["offset"];
	//TODO get the user's preferences for number of rows returned, ORDER BY
	$query .= "LIMIT $offset,20";
	if ($result = $mysqli->query($query))
		while ($row = $result->fetch_assoc()) {	?>
<tr>
<?php		foreach ($row as $colName => $column) {	?>
<td>
<?php			if ($colName == "Username")
					echo "<a href=\"userPage.php?user=$column\">$column</a>";
				else
					echo $column;
?>
</td>
<?php		}	?>
</tr>
<?php	}	?>
</table>
<?php $mysqli->close(); ?>