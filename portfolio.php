<?php ob_start();
session_start();

require_once('include/connect.php');
//session_start();  
error_reporting(0);
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	
		//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Quiz Management System</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
</head>
<body>
	<div id="wrapper">
		<!-- header -->
				<?php include 'header.php';?>

		<!-- end of header -->
		<!-- shell -->
		<div class="shell">
			<!-- main -->
			<div class="main">
				<!-- slider-holder -->
				<section class="slider-section">
					<h2 class="alignleft" style="color:#FFFFFF">Portfolio :: </h2>
					<a href="quiztestoption.php" class="buy-btn">Wanna Play Quiz ?</a><br>
					<div class="cl">&nbsp;</div>
					<!-- slider -->
					<div class="slider-holder">
						<p><span class="slider-shadow"></span>	                      </p>
						<p>&nbsp;</p>
						<p><img src="gimages/quiz.jpg" width="941" height="461">					</p>
				  </div>	
				<!-- end of slider -->
				</section>
				<!-- slider-holder -->
				<!-- cols -->
				<section class="cols">
															<?php include('midsection.php'); ?>

					<div class="cl">&nbsp;</div>
				</section>
				<!-- end of cols -->

				<!-- featured -->

				<!-- end of featured -->
			</div>
			<!-- end of main -->
		</div>
		<!-- end of shell -->
		<div id="footer-push"></div>
	</div>	
	<!-- footer -->
			<?php include('footer.php');?>

	<!-- end of footer -->
</body>
</html>