<?php
session_start();
include ('check_session.php');
include '../model/db.php';
include 'product.php';
$database = new dataBase();
$database->connectDB();
$product = new product();

$product_name = $price = $msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product->name = $_POST['Product_name'];
  $product->price = $_POST['Price'];
}


if(isset($_POST['submit'])){
	$target = "../uploads/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];


	//$sql = "INSERT INTO `product`(`product_name`, `price`, `image`) VALUES ('$Product_name','$Price','$image')";
    $database->insertDB($product->name, $product->price, $image);


	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "Successfully";
	}else{
		$msg = "There was a problem";
	}

	header("Location: http://localhost:8080/MVCdemo2/controller/list.php", true, 301);
    exit();
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
	<form action="/MVCdemo2/controller/add.php" method="POST" enctype="multipart/form-data">
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
</body>
</html>