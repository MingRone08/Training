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


	$sql = "INSERT INTO `product`(`product_name`, `price`, `image`) VALUES ('$Product_name','$Price','$image')";
    mysqli_query($link, $sql);


	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "Successfully";
	}else{
		$msg = "There was a problem";
	}
	echo $msg . "<br>";
	echo "Return to the previous page to display items";

	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form-signup</title>
	<style type="text/css">
		.btn {
		    position: fixed;
		    top: 210px;
		    left: 7%;
		}
	</style>
</head>
<body>
	<form action="/demo2/add.php" method="POST" enctype="multipart/form-data">
	  	<fieldset>
		    <legend>Create your product:</legend>
		    Product name:<br>
		    <input type="text" name="Product_name" placeholder="Product name">
		    <br>
		    Price:<br>
		    <input type="text" name="Price" placeholder="Price">
		    <br><br>
		    <div style="padding: 10px 0px">Product Image</div>
		    <input type="file" name="image"><br>
		    <br>
		    <button type="submit" name="submit">UPLOAD</button>
	  	</fieldset>
	</form>
	<form action="/demo2/display.php" method="POST" enctype="multipart/form-data" class="btn">
		<button type="submit" name="submit">DISPLAY</button>
	</form>
</body>
</html>