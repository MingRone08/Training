<?php
	session_start();
    include ('check_session.php');
    include '../model/db.php';
	
	if(isset($_GET['delete'])){
		$database = new dataBase();
		$database->connectDB();
		$d_row = $_GET['delete'];
		$result = $database->deleteDB($d_row);
		echo $_SESSION['logged_in'];
		header("location: http://localhost:8080/MVCdemo2/controller/list.php",true,301);
		exit();
	}