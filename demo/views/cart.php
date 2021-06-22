<?php
	include("session.php");

	
	if(!isset($_SESSION['cart'])){
		header("location: index.php");
	}
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
	
		<p><a href="index.php">Trang chủ</a>  || Xin chào, <?php echo $_SESSION["login_user"];?> ||    <a href="logout.php">Đăng xuất</a> </p> <br />
		<h1>Danh sách sản phẩm</h1> <br/>
    <table>
        <tr>
			<th>id</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
			<th>Tổng</th>
        </tr>
		<?php
            foreach($_SESSION["cart"] as $cart){
		?>
            <tr>
				<td><?php echo $cart["id"] ;?></td>
               <td><?php echo $cart["name"] ;?></td>
               <td><?php echo $cart["price"] ;?></td>
               <td><a href="" style = "margin: 10px">-</a><input style="width: 30px" type="text" name="qty" value="<?php echo $cart["qty"] ;?>"><a href="" style = "margin: 10px">+</a></td>
               <td><?php echo $cart["qty"] * $cart["price"];?></td>
            </tr>
        <?php	
            }
		?>
    </table>
	
	<a href="order.php">Tiến hành đặt hàng</a>
	
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