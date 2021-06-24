<?php
    include("config.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form 
       
       $myusername = mysqli_real_escape_string($db,$_POST['username']);
       $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
       
       $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
       $result = mysqli_query($db,$sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
       
       $count = mysqli_num_rows($result);
       
       // If result matched $myusername and $mypassword, table row must be 1 row
       if(isset($_POST["savepass"])){
		   setcookie('user', $myusername, time()+3600);
		   setcookie('pass', $mypassword, time()+3600);

	   }  
       if($count == 1) {
         
          $_SESSION['login_user'] = $myusername;
          
          header("location: index.php");
       }else {
          $error = "Your Login Name or Password is invalid";
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method = "POST" action = "">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username"
						<?php if(isset($_COOKIE['user'])) {?> value="<?php echo $_COOKIE['user']?>" <?php } else { ?> placeholder="User name" <?php } ?>>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" 
						<?php if(isset($_COOKIE['pass'])){ ?> value="<?php echo $_COOKIE['pass'] ?>" <?php } else {?> placeholder="Password" <?php } ?>>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input type="checkbox" name="savepass" /> <label>Nhớ mât khẩu </label>
					</div>
                    <div class="wrap-signup">
                        <a href="sign-up.php">sign-up</a>
                    </div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
