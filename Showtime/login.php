<?php
include 'functions.php';
//Database Connection
$conn = new conn;
$connect = $conn->connectDatabase();
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <script type="text/javascript">
         function display() {
			var b = prompt("Enter your e-mail");
            var z = prompt("Who is your first crush?");		
			getUserPassword(b,z);
			
        
        } 
		function getUserPassword(email,crush){
			$.get("fetchPassword.php?email=" + email + "&crush=" + crush, function(data){
			if(data != "-1"){
				alert("Your Password is: " + data);}
			else {
				alert("Please enter correct credentials");}
			});
		}
    </script>
	

		  
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Show Time</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a href="index.php">Home</a></li>
								<li><a href="login.php">Log In</a></li>
								<li><a href="book.php">Book Now</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>
<br>
<p>
<br>
				<!-- Wrapper -->
					<section id="wrapper">

						<!-- Content -->
							<div class="login-outter-wrap">
								<div class="inner login-wrapper">
									<h2 class="major">Login</h2>
									<?php
										if (isset($_SESSION['LoginAlert'])){
											echo "<h3>".$_SESSION['LoginAlert']."</h3>";
											$_SESSION['LoginAlert'] = "";
										}

									 ?>
									<form method="post" action="scripts/loginScript.php">
										<div class="field">
											<label for="name">Username</label>
											<input type="text" name="username" id="username" required placeholder="E-mail"/>
										</div>
										<div class="field">
											<label for="name">Password</label>
											<input type="password" name="password" id="password" required placeholder="Password"/>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Login" class="special fit"/></li>
										</ul>
										<a href="#" onclick="display()">Forgot Password? </a>
										 
										 <?php 
										  
											//echo $mail = "<script> document.write(b) </script>";
										?>
									    <br>
										<br>
										<a href="signup.php" class="button small">Sign Up</a>
									</form>
								</div>
							</div>

					</section>

			</div>


		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
