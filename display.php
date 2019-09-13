<html>
	<head>
		<title>Display Image</title>
		<link rel="stylesheet" type="text/css" href="1.css">
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
				</tr>
			</thead>
			<?php
				$link_1 = mysqli_connect("localhost:3306", "root", "", "traning task 1");
				$db = mysqli_select_db( $link_1, "traning task 1");

				$query = "SELECT * FROM `product` ";
				$result = mysqli_query($link_1 ,$query);

				while($row = mysqli_fetch_array($result)){
					?>
						<tr class="row">
							<td>
								<?php echo $row['product_name'];?>
							</td>
							<td>
								<?php echo $row['price'];?>
							</td>
							<td>
								<?php echo '<img src = product/'.$row['image'].'>'; ?>
							</td>
						</tr>

					<?php
				}
			?>
		</table>

	</body>
</html>