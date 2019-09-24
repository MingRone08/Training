<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search Form</title>
	<style>
        .paging1 {
            position: fixed;
            bottom: 50%;
            left: 0%;
        }

        .paging1 a {
            padding: 10px;
            text-decoration: none;
            border: 1px solid blue;
            color: blue;
            display: block;
        }
    </style>
</head>
<body>
	<form class="form" action="/MVCdemo2/controller/search.php">
		<div class="name">Name:</div>
		<input type="text" name="s_name" placeholder="Search Name">
		<div class="id">ID:</div>
		<input type="text" name="s_from_id" placeholder="From Product ID">
		<input type="text" name="s_to_id" placeholder="To Product ID">
		<div class="price">Price:</div>
		<input type="text" name="s_from_price" placeholder="From Price">
		<input type="text" name="s_to_price" placeholder="To Price">
		<input type="submit" name="submit" value="Accept filter">
	</form>
</body>
</html> -->


<?php
	session_start();
    include 'check_session.php';
    include '../model/db.php';
    $database = new dataBase();
    $database->connectDB();

	$sql = "SELECT * FROM product WHERE ";

	$exist = 0;

	function addAnd($check)
	{
		if($check > 0){
			global $sql;
			$sql  .= " AND ";
		}
	}

	if(isset($_GET['submit'])){
		$s_name = $_GET['s_name'];
		$s_from_id = $_GET['s_from_id'];
		$s_to_id = $_GET['s_to_id'];
		$s_from_price = $_GET['s_from_price'];
		$s_to_price = $_GET['s_to_price'];


		if(!empty($_GET['s_name'])){
			$exist++;
			$sql .= 'product_name LIKE "%' . $s_name .'%"';
		}
		if(!empty($_GET['s_from_id'])){
			addAnd($exist);
			$sql .= " product_id >= " . $s_from_id;
			$exist++;
		}
		if(!empty($_GET['s_to_id'])){
			addAnd($exist);
			$sql .= " product_id <= " . $s_to_id;
			$exist++;
		}
		if(!empty($_GET['s_from_price'])){
			addAnd($exist);
			$sql .= " price >= " . $s_from_price;
			$exist++;
		}
		if(!empty($_GET['s_to_price'])){
			addAnd($exist);
			$sql .= " price <= " . $s_to_price;
		}

		$result = $database->sqlQuery($sql);
		$numb_of_results = mysqli_num_rows($result);

		$result_per_page = 5;

		$numb_of_page = ceil($numb_of_results/$result_per_page);

		if(!isset($page)){
			$page = 1;
		}else{
			$page = $_GET['page'];
		}

		$first_item = ($page-1)*$result_per_page;

		$sql .= " ORDER BY product_id DESC LIMIT ". $first_item . ',' . $result_per_page ;
		$result = $database->sqlQuery($sql);

		?>
			<style>
		        .paging1 {
		            position: fixed;
		            bottom: 50%;
		            left: 0%;
		        }

		        .paging1 a {
		            padding: 10px;
		            text-decoration: none;
		            border: 1px solid blue;
		            color: blue;
		            display: block;
		        }
		    </style>
            <div class="paging1">
                <?php
                    for($page=1;$page<=$numb_of_page;$page++){
                        echo '<a href="/demo2/display.php?page='. $page .'">' . $page . '</a>';
                    }
                ?>
            </div>
        <?php

        include($_SERVER['DOCUMENT_ROOT'].'/MVCdemo2/controller/display.php');
	}
	
?>


