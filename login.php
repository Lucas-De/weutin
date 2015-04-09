<?php


$servername = "mysql.5freehosting.com";
$username = "u376662986_lucas";
$password = "gunterflousje$1996";
$dbname = "u376662986_login";


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "FAILED";
	} 



	$strSQL = "SELECT password FROM `Logins` WHERE email='". $_GET['email'] ."'";
	// $strSQL = "SELECT password FROM `Logins` WHERE email='lucas.descause@gmail.com'";
	$result = mysqli_query($conn, $strSQL);

	if ($result) {
	    // echo "account verified";

	    $row = mysqli_fetch_row($result);

	    if($row){
	    	$DBpass = $row[0];
	    	// echo $DBpass;
	    	$ENTERED_password= crypt($_GET['password'], sprintf('$2y$%02d$',9) . "U1N2C3R4A5C6K7A8B9L0E");
	    	// echo $ENTERED_password;
	    	if($ENTERED_password == $DBpass){
	    		// echo "login success";



	    		$strSQL2 = "SELECT userID FROM `Logins` WHERE email='". $_GET['email'] ."'";
	    		$result2 = mysqli_query($conn, $strSQL2);

	    		 if($result2){
	    		 	// echo "userid success";
		    		$row2 = mysqli_fetch_row($result2);
		    		$userID = $row2[0];
		    		echo "userid=".$userID;
		    		setcookie("userID", strval($userID));
	    		}
	    		else{
	    			echo "userid fail";
	    		}



	    		header("Location: http://weutin.com/profile.html");
	    	}
	    	else{
	    		echo "login failed";
	    	}


	    }
	    else{
	    	echo "account doesn't exist";
	    }
		

	   
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}


	





	$conn->close();

?>