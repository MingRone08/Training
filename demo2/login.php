<?php 
	if(isset($_POST['submit'])){
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['logged_in'] = 1;
		include ('check_session.php');
	}

	include ($_SERVER['DOCUMENT_ROOT'].'/demo2/Style/html/login.html');
?>