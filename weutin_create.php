<?php


$servername = "mysql.5freehosting.com";
$username = "u376662986_lucas";
$password = "gunterflousje$1996";
$dbname = "u376662986_login";

if($_GET['email']!=""){

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
	    echo "Account created successfully. Please check your email and verify your account";
	
		$message = "
		<html>
			<head>
				<style>
					@font-face {
					font-family: simple-th;
					src: url(Montserrat-Light.woff);        
					}

					body{
						margin: 0;
					}
					img{
						
						position: absolute;
						margin: 0;
						top:10px;
						width: 170px;
						left:calc(50% - 85px);
					
					}
					h1{
						font-size: 1.5em;
						font-family: arial;
						position: absolute;
						margin: 0;
						top:150px;
						width: 100%;
						text-align: center;
						color: #595959;

					}
					a{
						color:#ff9047 !important;
						text-decoration:none;
					}
				</style>
			</head>
			<body>
				<img src='http://s9.postimg.org/hs9eyeny3/logo.png'>
				<h1>THANKS FOR SIGNING UP &#183; CLICK <a href='http://www.weutin.com/verify.php?code=".base64_encode($_GET['email'])."'>HERE</a> TO VALIDATE YOUR ACCOUNT<h1>

			</body>
			</html>
		";

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <noreply@weutin.com>' . "\r\n";
		mail($_GET['email'], "Verify Account", $message, $headers);
		// header("Location: http://littlefacemitt.com/");
	} 
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}
else{
	 header("Location: http://weutin.com/");
}
?>