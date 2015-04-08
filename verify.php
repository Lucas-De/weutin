<?php


$servername = "mysql.5freehosting.com";
$username = "u708071212_lucas";
$password = "gunterflousje$1996";
$dbname = "u708071212_login";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "FAILED";
	} 



		$strSQL = "UPDATE Logins SET verified=1 WHERE email="."'".$_GET['email']."'";
	// echo $strSQL;


	if ($conn->query($strSQL) === TRUE) {
	    echo "account verified";
	   
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

?>