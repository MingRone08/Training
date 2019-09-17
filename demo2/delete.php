<?php
	if(isset($_GET['delete'])){
		$d_row = $_GET['delete'];
		$link = mysqli_connect('localhost:3306','root','','traning task 1');
		$sql = "DELETE FROM `product` WHERE product_id = ". $d_row;
		$result = mysqli_query($link, $sql);
		header("location: http://localhost:8080/demo2/display.php",true,301);
		exit();
	}
?>