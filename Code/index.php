

			<?php
			 session_start();
				// if someone is logged in, display it. If not it won't display anything
				if (isset($_SESSION['username'])) {
					echo "<p>user <em>{$_SESSION['username']}</em> is logged in</p>";
				}
			?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<title>Home</title>
</head>
<body> 
	<?php require_once('navbar.php'); ?>

	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="https://lucontractors.com/wp/wp-content/uploads/2018/02/remodeling.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="https://lucontractors.com/wp/wp-content/uploads/2012/10/s5.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="https://lucontractors.com/wp/wp-content/uploads/2012/10/s4.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<h1></h1>

	<!-- Carousel which contatins a slide show with the 3 images we attached from google -->

	<!-- Optional JavaScript; choose one of the two! -->
	<div class="container">
	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</div>
	<br>
	<center> <a href="customersignuppage.php"><button type="button" class="btn btn-primary btn-lg">Sign Up to Recieve a Free Quote Today!</button> </a> <center> 
		<br>
	<div class="form-group col-md-6">	
		<center>
		<p> At Line Up Contractors, Inc., we are general contractors for both residential and commercial markets. We serve the Washington, DC Area, Maryland and Virginia with a wide array of construction and remodeling services to home owners, retail shops, medical care providers, banks, offices etc. It is our belief that our customers should get exactly what they want. Just like any other purchase. We believe that the only way to meet your goals is through honesty and integrity. <p> <center>
		<!--Displayed under our slideshow and visible to the user which is centered-->
	</div>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>