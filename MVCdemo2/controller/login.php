<?php 
	session_start();
	if(isset($_POST['submit'])){
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['logged_in'] = 1;
		include($_SERVER['DOCUMENT_ROOT'].'/MVCdemo2/controller/check_session.php');
	}


	include ($_SERVER['DOCUMENT_ROOT'].'/MVCdemo2/view/html/login.html');
?>