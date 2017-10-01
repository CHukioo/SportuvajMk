<?php 

session_start();

if ($_SESSION['usernameMy'] != null && $_SESSION['passwordMy'] != null) {
	$_SESSION['usernameMy'] = null;
	$_SESSION['passwordMy'] = null;
}
if ($_SESSION['usernameMy'] == null && $_SESSION['passwordMy'] == null) {
	header('Location: login.php');
}

?>