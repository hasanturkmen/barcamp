<?php
	session_start();
	$_SESSION = array();
	$uname=$_COOKIE['username'];
	setcookie("username",'', time()-42000,'/');
	unset($_COOKIE['username']);
	session_destroy();
	header("Location:login.php?message=You've been logged out.");
?>