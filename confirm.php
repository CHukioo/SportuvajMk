<?php
	
	$code = $_GET['verify'];
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "sportuvaj_mk";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	    error_log("Connection failed:".$conn->connect_error.PHP_EOL, 3, "logs\log.log");
	} 

	$sql = "UPDATE login_user SET verify='1' WHERE verify='".$code."'";

	if ($conn->query($sql) === TRUE) {
	    header('Location: login.php?tocno=6');
	} else {
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
	
?>
