<?php
require_once 'functions.php';


//Start session
session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>My show Time</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/custom.css" />
		<script>
			window.onload = function() {
				var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
					  document.getElementById("synopsis").innerHTML = xhttp.responseText;
					}
				  };
				  xhttp.open("GET", "synopsis.php", true);
				  xhttp.send();

			};
		</script>
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">Tekket</a></h1>
						<nav>
							<a href="#menu">
								<?php

								if (isset($_SESSION["user"])){
									echo $_SESSION["user"];
								}else{
									echo "Menu";
								}
								 ?>
							</a>
						</nav>
          </header>

  				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>
								<?php
								if (isset($_SESSION["user"])){
									echo $_SESSION["user"];
								}else{
									echo "Menu";
								}
								 ?>
							</h2>
							<ul class="links">
								<li><a href="index.php">Home</a></li>
								<?php
								if (isset($_SESSION["user"])){
									echo "<li><a href='scripts/logoutScript.php'>Logout</a></li>";
								}else{
									echo "<li><a href='login.php'>Login</a></li>";
								}
								 ?>
								 <li>
									<a href="book.php">Book Now</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!--Main Banner -->
					<section id="banner" style="padding-top:10px">
						<div class="inner">
							<div class="logo"><span class="icon fa-ticket"></span></div>
							<h2>Its Show Time</h2>
						</div>
						<div id="slideshow">
						   <div>
						     <img class="bannerSize" src="http://www.trbimg.com/img-56b4bf94/turbine/sfp-movie-review-kung-fu-panda-3-upbeat-but-intense-sequel-looks-at-identity-family-ties-20160205">
						   </div>
						   <div>
						     <img class="bannerSize" src="http://www.25cineframes.com/images/gallery/2013/new/prabhas-baahubali-movie-wallpapers-ultra-hd/27-Prabhas-Baahubali-Movie-Wallpapers-Ultra-HD.jpg">
						   </div>
						   <div>
						     <img class="bannerSize" src="http://moviesfire.net/wp-content/uploads/2015/07/Thor-2011.jpg" height="40">
						   </div>
							 <div>
						     <img class="bannerSize" src="http://nos.nl/data/image/2015/10/22/219269/xxl.jpg">
						   </div>
						</div>
					</section>

				<!-- Wrapper -->
				<section id="wrapper">
		
						<!-- Movie List -->
							<section id="four" class="wrapper alt style1">
								<div class="inner">
									<h2 class="major">New Movies</h2>
									
									<section class="features">
										
										<article>
											<a href="#" class="image"><img src="http://www.hdwallpapers.in/walls/the_conjuring_movie-wide.jpg" alt="" /></a>
											<h3 class="major">Conjuring</h3>
											<?php
												$sql = "SELECT * FROM `movie` WHERE title='Spectre'";
												$conn = new conn;
												$connect = $conn->connectDatabase();												
												$result = mysqli_query($connect, $sql);
												while ($row = mysqli_fetch_object($result))
												{
													echo $row->synopsis;
												}
											
							                 ?>
											<a href="book.php" class="special">Book Now</a>
										</article>
										<article>
											<a href="#" class="image"><img src="http://c.saavncdn.com/594/Kapoor-Sons-Since-1921-Hindi-2016-500x500.jpg" alt="kaporor&sons" height="300"/></a>
											<h3 class="major">Kapoor & sons</h3>
											<?php
												$sql = "SELECT * FROM `movie` WHERE title='The Peanuts Movie'";
												$conn = new conn;
												$connect = $conn->connectDatabase();												
												$result = mysqli_query($connect, $sql);
												while ($row = mysqli_fetch_object($result))
												{
													echo $row->synopsis;
												}
												?>
											<a href="book.php" class="special">Book Now</a>
										</article>
										<article>
											<a href="#" class="image"><img src="http://www.hdwallpapers.in/walls/interstellar-wide.jpg" alt="" /></a>
											<h3 class="major">Intersteller</h3>
											<?php
												$sql = "SELECT * FROM `movie` WHERE title='Bridge of Spies'";
												$conn = new conn;
												$connect = $conn->connectDatabase();												
												$result = mysqli_query($connect, $sql);
												while ($row = mysqli_fetch_object($result))
												{
													echo $row->synopsis;
												}
												?>
											<a href="book.php" class="special">Book Now</a>
										</article>
										<article>
											<a href="#" class="image"><img src="http://static.sify.com/cms/image/oheriubbdjfff.jpg" alt="" /></a>
											<h3 class="major">Banglore Days</h3>
                                               <?php
												$sql = "SELECT * FROM `movie` WHERE title='The Martian'";
												$conn = new conn;
												$connect = $conn->connectDatabase();												
												$result = mysqli_query($connect, $sql);
												while ($row = mysqli_fetch_object($result))
												{
													echo $row->synopsis;
												}
												?>
											<a href="book.php" class="special">Book Now</a>
										</article>
									</section>
									<ul class="actions">
										<li><a href="book.php" class="button">Browse All</a></li>
									</ul>
								</div>
							</section>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">

							<ul class="copyright">
								<li>&copy; 2016, All rights reserved.</li>
							</ul>
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
