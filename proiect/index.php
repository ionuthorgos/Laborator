<?php
session_start();
include "Helpers/Initialisation.php";
include "Helpers/Autoload.php";
include "Helpers/AditionalFunctions.php";
include "Helpers/Administrator.php";

define ("TEMPLATE",true);
?>

<!DOCTYPE html>
<html>
	<head>
	 	 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="Resources/Public/CSS/feature-carousel.css">
		<link rel="stylesheet" href="Resources/Public/CSS/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		 
		  <script src="Resources/Public/JS/jquery-1.7.min.js" type="text/javascript" charset="utf-8"></script>
    	  <script src="Resources/Public/JS/jquery.featureCarousel.min.js" type="text/javascript" charset="utf-8"></script>
		 <script type="text/javascript">
	     	$(document).ready(function() {
          var carousel = $("#carousel").featureCarousel({
          });

          $("#but_prev").click(function () {
            carousel.prev();
          });
          $("#but_pause").click(function () {
            carousel.pause();
          });
          $("#but_start").click(function () {
            carousel.start();
          });
          $("#but_next").click(function () {
            carousel.next();
          });
        });
    	</script>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="row">
					<div class="col-md-8">
						<div class="page-header">
							
							 <h1 > <img src="Resources/Images/descarcare.jpg" width="90">Proiect Final</h1>
						</div>
					</div>
					<div class="col-md-4">
						<div class="pull-right">
							<?php UsersController::loginStatus(); ?>
						</div>
					</div>
				</div>
			</header>
			<nav class="navbar navbar-default ">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php">Menu</a>
			    </div>

			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav navbar-right">
					  <?php if(array_key_exists("connected", $_SESSION)) { ?>
					 
			        		<li><a href="#top">Recovery exercises</a></li>
					  <?php } ?>
			        <li><a href="#top1">Contact</a></li>
			      </ul>
					
			    </div>
			  </div>	
			</nav>
			<button onclick="topFunction()" id="myBtn">Up</button>
			<?php echo initialisation(); ?>
			
		</div>
		
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="Resources/Public/JS/jquery-3.2.1.min.js"></script>
		 <!-- <script src="Resources/Public/JS/custom.js"></script> -->
		<!-- <script src="Resources/Public/JS/jquery.featureCarousel.js"></script> --> 
		
	</body>
</html>