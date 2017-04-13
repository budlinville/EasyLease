<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT email, password FROM EasyLeaseUsers WHERE email = '$email'";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $fetchedEmail = $row["email"];
        $fetchedPassword = $row["password"];
    }
}

//check login information
if ($username = $fetchedUsername && password_verify($password, $fetchedPassword)) {
  //
}

$result->free();

/* close connection */
$mysqli->close();
?>
