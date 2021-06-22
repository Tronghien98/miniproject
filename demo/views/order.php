<?php
    include("session.php");
    

    if(!isset($_SESSION['cart'])){
		header("location: index.php");
	} else {
        $total = 0;
        foreach($_SESSION["cart"] as $cart){
            $total += $cart["price"]*$cart["qty"];
        }
        $username = $_SESSION['login_user'];
        $sql_user = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $sql_user);
        $row = mysqli_fetch_array($result);
        $id = $row['id'];

        $sql = "INSERT INTO orders(total, uid) VALUES('$total','$id')";
        $result = mysqli_query($db, $sql);
        
        $oid = mysqli_insert_id($db);
        foreach($_SESSION["cart"] as $cart){
            $pid = $cart["id"];
            $qty = $cart["qty"];
            $sum = $cart["qty"] * $cart["price"];
            $sql = "INSERT INTO proceed_order(oid, pid, quantity, sum) 
            VALUES('$oid', '$pid', '$qty', '$sum')";
            $result = mysqli_query($db, $sql);    
        }
        unset($_SESSION["cart"]);
        
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
	
		<p>Xin chào, <?php echo $_SESSION["login_user"];?>    <a href="logout.php">Đăng xuất</a> </p> <br />
		<h1>ĐƠn hàng của bạn</h1> <br/>
    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá </th>
			<th>Tổng</th>
        </tr>
		<?php
      
			$sql = "SELECT name, price, quantity, sum FROM orders AS o INNER JOIN proceed_order AS po ON o.id = po.oid 
            INNER JOIN products AS p ON p.id = po.pid WHERE o.id = '$oid'";
			$result = mysqli_query($db, $sql);

			if(mysqli_num_rows($result) > 0){
                
				while($rows = mysqli_fetch_assoc($result)){
					
					echo "<tr><td>" .$rows["name"]  ."</td>";
					echo "<td>" .$rows["quantity"] ."</td>";
					echo "<td>" .$rows["price"] ."</td>";
                    echo "<td>" .$rows["sum"] ."</td>";
					echo "</tr>"; 
				}
                $sql_total = "SELECT total FROM orders WHERE id = '$oid'";
                $result_total = mysqli_query($db, $sql_total);
                $row_total = mysqli_fetch_array($result_total);
                echo "<tr><td colspan='3'> TỔNG </td>" ;
                echo "<td>" .$row_total["total"] ."</td></tr>";
			} else {
				echo "<tr><td colspan='4'> No Data! </td></tr>" ;
			}
		?>
    </table>
	<a href="index.php">Về trang chủ</a> ||  <a href="cart.php" class="">Xem giỏ hàng (<?php if(isset($_SESSION["cart"])){ echo count($_SESSION["cart"]); } else { echo 0 ;}?>)</a> 
	
	
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