<html>
	<head>
		<title>Display Image</title>

		<link rel="stylesheet" type="text/css" href="../view/css/DP5.css">
		<script src="../view/js/jquery-3.4.1.js"></script>
		<script src="../view/js/DP.js"></script>
	</head>
	<body>
		<div class="logout"><a href="/MVCdemo2/controller/out.php">Logout</a></div>
		<div class="add"><a href="/MVCdemo2/controller/add.php">Add</a></div>
		<div class="filter">Filter</div>
		<table>
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php
			
				while($row = mysqli_fetch_array($result)){
					?>
						<tr class="row" id=<?php echo $row['product_id']?> >
							<td>
								<?php echo $row['product_id']?>
							</td>
							<td>
								<?php echo $row['product_name'];?>
							</td>
							<td>
								<?php echo $row['price'];?>
							</td>
							<td>
								<?php echo '<img src = ../uploads/'.$row['image'].'>'; ?>
							</td>
							<td>
								<?php echo '<a href="/MVCdemo2/controller/edit.php?edit='. $row[0] . '">Edit</a>';?> 
							</td>
							<td>
								<?php 
									echo '<input type="button" onClick="deleteme('. $row[0] .')" class="delete" value="Delete">';
								?>
							</td>
						</tr>
						<script language="javascript">
							function deleteme(delid){
								if(confirm("Do you want to delete?")){
									window.location.href="/MVCdemo2/controller/delete.php?delete=" + delid;
									return true;
								}
							}
						</script>

					<?php
				}
			?>
		</table>

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
</html>