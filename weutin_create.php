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


$password=$_GET['password'];
$hashed= crypt($password, sprintf('$2y$%02d$',9) . "U1N2C3R4A5C6K7A8B9L0E");
// echo $hashed;

	
	$strSQL= "SELECT COUNT(*) FROM Logins";
	$result=$conn->query($strSQL);
	$row = mysqli_fetch_row($result);
	$userId = $row[0];
	// echo $userId;

	$strSQL = "INSERT INTO Logins(";
	$strSQL = $strSQL . "userID, ";
	$strSQL = $strSQL . "email, ";
	$strSQL = $strSQL . "name, ";
	$strSQL = $strSQL . "password) ";

	$strSQL = $strSQL . "VALUES(";
	$strSQL = $strSQL . "'". $userId    . "'" .", ";
	$strSQL = $strSQL . "'". $_GET['email']    . "'" .", ";
	$strSQL = $strSQL . "'". $_GET['name']     . "'" .", ";
	$strSQL = $strSQL . "'". $hashed . "'" .")";
// echo $strSQL;


if ($conn->query($strSQL) === TRUE) {
    echo "New record created successfully";
    header("Location: http://littlefacemitt.com/");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>