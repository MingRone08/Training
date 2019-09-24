<?php
    session_start();
    include ('check_session.php');
    include '../model/db.php';
    $database = new dataBase();
    $database->connectDB();


	if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $res = $database->queryDB($id);
        $row = mysqli_fetch_array($res);
    }
    
    if(isset($_POST['edited'])){
        $id = $_POST['id'];
        $res = $database->queryDB($id);
        $row = mysqli_fetch_array($res);

        $new_product_name = $_POST['new_product_name'];
        $new_price = $_POST['new_price'];
        $target = "../uploads/".basename($_FILES['new_image']['name']);
        $new_image = $_FILES['new_image']['name'];
        if( empty($new_image) ){
            $new_image = $row['image'];
        }
        
        $sql = "UPDATE `product` SET `product_name`='$new_product_name',`price`='$new_price',`image`='$new_image' WHERE `product_id`='$id'";
        $res = $database->sqlQuery($sql);
        if(move_uploaded_file($_FILES['new_image']['tmp_name'], $target)){
            $msg = "Successfully";
        }else{
            $msg = "There was a problem";
        }

        header("Location: http://localhost:8080/MVCdemo2/controller/list.php", true, 301);
        exit();
    }
?>

<form action="/MVCdemo2/controller/edit.php" method="POST" enctype="multipart/form-data">
	<fieldset>
        <legend>Edit your product:</legend>
        <input type="hidden" name="id" value="<?php echo $row[0] ?>">
		Product name:<br>
		<input type="text" name="new_product_name" value="<?php echo $row['product_name'] ?>" >
		<br>
		Price:<br>
		<input type="text" name="new_price" value="<?php echo $row['price'] ?>" >
		<br><br>
		<div style="padding: 10px 0px">Edit Product Image</div>
		<input type="file" name="new_image" ><br>
		<br>
		<button type="submit" name="edited">Edit</button>
	</fieldset>
</form>