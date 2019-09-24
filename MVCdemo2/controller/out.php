<?php
	session_start();
	$_SESSION['logged_in'] = 0;
	include ('check_session.php');
?>