<?php
/*
Written by Bud Linville
Tested by Ben Conner
Debugged by Ben Conner

5/1/17
Verifies user login credentials
*/
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $mysqli = new mysqli("mysql.eecs.ku.edu", "alinvill", "lacrosse2", "alinvill");

  /* check connection */
  if ($mysqli->connect_errno) {
		printf("{}");
		exit();
	}

  $cookie_name = "user";	

  $username = $_GET["username"];
  $password = $_GET["password"];

  //need to change this back to EasyLeaseUsers or whatever appropriate table is called
  $query = "SELECT Username, Hashed_Password FROM Users WHERE Username = '$username'";
  $fetchedUsername = NULL;
  $fetchedPassword = NULL;

  if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          $fetchedUsername = $row["Username"];
          $fetchedPassword = $row["Hashed_Password"];
      }
  }

  //check login information
  if ($username == $fetchedUsername && password_verify($password, $fetchedPassword)) {
    setcookie($cookie_name, $fetchedUsername, 0, "/");	
    header("Location: https://people.eecs.ku.edu/~alinvill/EasyLease/");
  } else {
	echo "<script>alert('Incorrect Login Info');</script>";
	header("Location: ../login.html");
  }

  $result->free();

  /* close connection */
  $mysqli->close();
?>
