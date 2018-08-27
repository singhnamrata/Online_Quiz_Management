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
<!--					<h2 class="alignleft">WE CREATE <strong>BEAUTIFUL</strong> WEBSITE TEMPLATES </h2>
-->					<a href="quiztestoption.php" class="buy-btn">Wanna Play Quiz ?</a>
					<div class="cl">&nbsp;</div>
					<!-- slider -->
				<?php
				$sql="select * from gallery";
				$rs=mysql_query($sql);
				
				?>
					<div class="slider-holder">
						<span class="slider-shadow"></span>
						<div class="flexslider">
							<ul class="slides">
							<?php while($ro=mysql_fetch_array($rs)){?>
								<li>
									<img src="gimages/<?php echo $ro['photo']; ?>" alt="" />
<!--									<div class="slide-cnt">
-->										<h3><?php //echo $ro['name']; ?></h3>
										<p><?php //echo $ro['details']; ?></p>
<!--									</div>
-->								</li>
								<?php } ?>
								<!--<li>
									<img src="css/images/slide-img.jpg" alt="" />
									<div class="slide-cnt">
										<h3>Integer Aliquam Amet Sit Dolor</h3>
										<p>Quam vel tempor porta, dolor tortor cursus elit, sit amet ultrices ipsum metus quis.</p>
										<a href="#" class="slider-btn"><span></span>Explore More</a>
									</div>
								</li>
								<li>
									<img src="css/images/slide-img.jpg" alt="" />
									<div class="slide-cnt">
										<h3>Integer Aliquam Amet Sit Dolor</h3>
										<p>Quam vel tempor porta, dolor tortor cursus elit, sit amet ultrices ipsum metus quis.</p>
										<a href="#" class="slider-btn"><span></span>Explore More</a>
									</div>
								</li>
	-->						</ul>
						</div>
					</div>	
				<!-- end of slider -->
				</section>
				<!-- slider-holder -->
				<!-- cols -->
				<section class="cols">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="95%"> </td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

					<?php include('midsection.php'); ?>
					<div class="cl">&nbsp;</div>
				</section>
				<!-- end of cols -->
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