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
	<title>Car Rental System</title>
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
					<h2 class="alignleft" style="color:#FFFFFF">About Us ::</h2>
					<a href="quiztestoption.php" class="buy-btn">Wanna Play Quiz ?</a>
					<div class="cl">&nbsp;</div>
					<!-- slider -->
					<div class="slider-holder">
						<span class="slider-shadow"></span>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  
 
 
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><tr>
    <td>&nbsp;</td>
    <td><p>A customer is the most important person in our business. a customer is   not an interruption of our work – he is the purpose of it. We are not   doing him a favor by serving him – he is giving us the opportunity to do   so. W customer is not dependent upon us – we are dependent upon him. W   customer is not an outsider to our business – he is a part of it. W   customer is not a cold statistic – he is a flesh and blood human being   with feelings and emotions, biases and prejudices. W customer is not   someone to argue or to match wits with. Nobody ever won an argument with   a customer. A customer is someone who brings us his wants. It´s our job   to handle them profitably to him and ourselves. </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>We want to ensure our customers have access to worldwide car hire services at the lowest possible prices so that you could not only save time by dealing with just one company but could also have confidence that they are getting excellent value for money as well as great service.</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p> In practical terms, this means our multilingual contact centre is open 7 days a week and can be reached with a phone call from wherever you are in the world. We don't add service charges or credit card charges to our prices, and unlike many other large travel companies, we don't impose charges for making changes to your booking.</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>

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
					<?php include('fetures.php'); ?>
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