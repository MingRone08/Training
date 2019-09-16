<html>
	<head>
		<title>Display Image</title>
		<link rel="stylesheet" type="text/css" href="Style/css/display.css">
	</head>
	<body>
		<table>
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Edit</th>
				</tr>
			</thead>
			<?php

				include($_SERVER['DOCUMENT_ROOT'].'/demo2/list.php'); 
			
				while($row = mysqli_fetch_array($result_1)){
					?>
						<tr class="row">
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
								<?php echo '<img src = product/'.$row['image'].'>'; ?>
							</td>
							<td>
								<?php echo '<a href="/demo2/edit.php?edit='. $row[0] . '">Edit</a>' ; ?> 
							</td>
						</tr>

					<?php
				}
			?>
		</table>

	</body>
</html>