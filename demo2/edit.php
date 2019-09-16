<?php  
	if(isset($_GET['edit'])){
        $link = mysqli_connect("localhost:3306", "root", "", "traning task 1");
        $id = $_GET['edit'];
        $res = mysqli_query($link,"select * from product where product_id='$id'");
        $row = mysqli_fetch_array($res);
    }
    
    if(isset($_POST['edited'])){
        $link = mysqli_connect("localhost:3306", "root", "", "traning task 1");
        $target = "product/".basename($_FILES['image']['name']);
        $new_product_name = $_POST['new_product_name'];
        $new_price = $_POST['new_price'];
        $new_image = $_FILES['new_image']['name'];
        $id = $_POST['id'];
        $sql = "UPDATE `product` SET `product_name`='$new_product_name',`price`='$new_price',`image`='$new_image' WHERE `product_id`='$id'";
        $res = mysqli_query($link, $sql);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "Successfully";
        }else{
            $msg = "There was a problem";
        }
        echo $msg . "<br>";
        sleep(10);
        header("Location: http://localhost:8080/demo2/display.php", true, 301);
        exit();
    }
?>

<form action="/demo2/edit.php" method="POST" enctype="multipart/form-data">
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
		<input type="file" name="new_image" value="<?php echo $row['image']?>" ><br>
		<br>
		<button type="submit" name="edited">Edit</button>
	</fieldset>
</form>