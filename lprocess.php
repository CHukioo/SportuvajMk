<?php 

session_start();
?>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

if (is_null($username) && is_null($password)) {
	$username = $_SESSION['usernameMy'];
	$password = $_SESSION['passwordMy'];
}


$conn = mysqli_connect("localhost", "root", "root");
mysqli_select_db($conn, "sportuvaj_mk");

$result = mysqli_query($conn, "select * from login_user where username='$username' and password='$password' and verify='1'") or die("Nemom da pristapam ".mysql_error());
$row = mysqli_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password) {
	if ($username == "") {
		echo "YOU ARE NOT LOGEDIN. PLEASE <a href='login.php'>LOGIN</a>";
	}
	else{
		echo "HELLO: ".$username;
		$_SESSION['usernameMy'] = $username;
		$_SESSION['passwordMy'] = $password;
		header('Location: dashboard.php');
		echo "<form action='logout.php' method='post'> <input type='submit' value='LOGOUT'></form>";
	}
}
else {
	header('Location: login.php?tocno=1');
}
?>