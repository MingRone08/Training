<?php

$Product_name = $Price = $msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Product_name = $_POST['Product_name'];
  $Price = $_POST['Price'];
}


ini_set('mysql.connect_timeout', 1500);
ini_set('default_socket_timeout',1500);

$link = mysqli_connect("localhost:3306", "root", "", "traning task 1");
 
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

if(isset($_POST['submit'])){
	$target = "product/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];


	try {
		$sql = "INSERT INTO `product`(`product_name`, `price`, `image`) VALUES ('$Product_name','$Price','$image')";
    	mysqli_query($link, $sql);
	} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
		


	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "Successfully";
	}else{
		$msg = "There was a problem";
	}
	echo $msg . "<br>";
	echo "Return to the previous page to display items";

	}


?>