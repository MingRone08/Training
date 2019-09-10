<?php session_start();
// Nếu click vào nút Lưu Session
    $_SESSION['name'] = $_GET['uname'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bai 1</title>

	<script src="../js/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="../1.css">
	<script src="../1.js"></script>
</head>
<body>
	<div class="header">
		<div class="logo">Random</div>
		<div class="info">
			<div class="icon"><img src="..\img\7.jpg" alt=""></div>
			<div class="name">
				<?php echo $_SESSION['name']; ?>
			</div>
		</div>
		<a href="login.html" class="btn empty">Login</a>
		<a href="login.html" class="out">Logout</a>
	</div>
	<div class="product">
		<div class="prod-img"><img src="../img/1.jpg" alt=""></div>
		<div class="fading"></div>
		<div class="big-word">Round Bag</div>
		<div class="small-word">With small design but still very delicate</div>
		<div class="price">39.99$</div>
	</div>
	<div class="footer"></div>
</body>
</html>