<?php
    include('session.php');

	$id = intval($_GET['id']);
	
	$sql = "SELECT * FROM products WHERE id = '$id'";

	$result = mysqli_query($db, $sql);

	if(mysqli_num_rows($result) == 0){
		header("location: index.php");
	}
	if(mysqli_num_rows($result) == 1){
		$rows = mysqli_fetch_assoc($result);
		$id = $rows["id"];
		$name = $rows["name"];
		$price = $rows["price"];
	}
	

    if($_SERVER["REQUEST_METHOD"] == "POST"){
		
        $name = mysqli_real_escape_string($db, $_POST["name"]);
        $price = mysqli_real_escape_string($db, (integer)$_POST["price"]);

        $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'";

        mysqli_query($db, $sql);
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

</head>
<body>
	
<form class="login100-form validate-form p-b-33 p-t-5" method = "POST" action = "">

<div class="wrap-input100 validate-input" data-validate = "Enter username">
    <label>ID: </label>
	<input class="input100" type="text" name="id" value="<?php echo $id ?>" disabled>
</div>

<div class="wrap-input100 validate-input" data-validate = "Enter username">
    <label>Tên sản phẩm: </label>
	<input class="input100" type="text" name="name" value="<?php echo $name ?>">
</div>

<div class="wrap-input100 validate-input" data-validate="Enter password">
	<label>Giá: </label>
    <input class="input100" type="text" name="price" value="<?php echo $price ?>">
</div>

<div class="container-login100-form-btn m-t-32">
    <button class="login100-form-btn">
        Sửa sản phẩm
    </button>
</div>

</form>

	
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