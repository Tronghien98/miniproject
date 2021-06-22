<?php
	include("session.php");

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trang chủ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
table {
  margin: 10px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th, td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>
	
		<p>Xin chào, <?php echo $login_session;?>    <a href="logout.php">Đăng xuất</a> </p> <br />
		<h1>Danh sách sản phẩm</h1> <br/>
    <table>
        <tr>
            <th>ID sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
			<th>Chức năng</th>
        </tr>
		<?php
			$sql = "SELECT * FROM products";
			$result = mysqli_query($db, $sql);

			if(mysqli_num_rows($result) > 0){
				while($rows = mysqli_fetch_assoc($result)){
					echo "<tr><td>" .$rows["id"] ."</td>";
					echo "<td>" .$rows["name"] ."</td>";
					echo "<td>" .$rows["price"] ."</td>";
					echo "<td><a href='editProduct.php?id=" .$rows["id"] ."'>Sửa</a>/<a href='delProduct.php?id=" .$rows["id"] ."'>Xóa</a>/
					<a href='addCart.php?id=" .$rows["id"] ."'>Đặt hàng</a></td>";
					echo "</tr>"; 
				}
			} else {
				echo "<tr><td colspan='3'> No Data! </td></tr>" ;
			}
		?>
    </table>
	<a href="addProduct.php">Thêm sản phẩm</a> ||  <a href="cart.php" class="">Xem giỏ hàng (<?php if(isset($_SESSION["cart"])){ echo count($_SESSION["cart"]); } else { echo 0 ;}?>)</a> 
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>