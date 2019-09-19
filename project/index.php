<!-- 
<?php
// Init + Start session
session_start();
$_SESSION['user']="";
// Redirect users to the main page if already signed in
if (is_array($_SESSION['user'])) {
  header("Location: success.php");
  die();
}
?> -->
<!DOCTYPE html>
<html>
<head>
<title>Login Page|HNG Intership</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
		<h1>Login form</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">
			<?php if(isset($_SESSION["msg"])){?>	
			<span id="demo" style="font-size:30px;"> 
			<?php	echo $_SESSION["msg"];?> </span>
			<?php } ?>  

				<form action="index.php" method="post" id="login-form" onsubmit="return login();">
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="email" name="email" id="login-email" placeholder="Email Address" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password"  name="password" id="login-password" placeholder="Password" required=""/>
					</div>
					<div class="bottom">
						<button class="btn">Log In</button>
					</div>
					<div class="links">
						<!-- <p><a href="#">Forgot Password?</a></p> -->
						<p class="right"><a href="register.php" target="_parent">New User? Register</a></p>
						<div class="clear"></div>
					</div>
				</form>	
			</div>
			<div class="social">
				<ul>
					<li>or login using : </li>
					<li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>
					<li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
					<li><a href="#" class="google"><span class="fa fa-google-plus"></span></a></li>
				</ul>
			</div>
		</div>
		
		<!-- copyright -->
		<div class="copyright">
			<p> copy right &copy; <?php echo date("Y"); ?> HNG Intership Login Form . All rights reserved | Design by Team Area 51</p>
		</div>
		<!-- //copyright --> 
	</div>
</div>	
<!-- //main -->
<script src="login.js"></script>


</body>
</html>
<?php  unset($_SESSION['msg']);?> 