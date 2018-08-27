<?php
require_once('include/connect.php');
//session_start();  
error_reporting(0);
session_start();

foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	//exit;
	 if(isset($_SESSION['stdname'])){
	 
		            header("Location:book.php?carId=$carId");
exit;
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
		
		
if(isset($_POST['submit'])){
   
   	
		$sqlIns="select * from client where email='$email'";
	    //exit;
		$rsIns=mysql_query($sqlIns);
		//$id=mysql_insert_id();
		$num=mysql_num_rows($rsIns);
		$row=mysql_fetch_array($rsIns);
		if($num>0)
		{
		//$_SESSION['stdname']=$row['name'];
        //$_SESSION['stdid']=$row['id'];
		$pass=$row['password'];
		$msg = "Your Email Address:'".$email."' and Password Is:'".$pass."'";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Login Details",$msg);
		
		
		
		
		
		header("location:forgotPass.php?msgSend=2");
		exit;
		}
		else
		{
				header("location:forgotPass.php?msg=1");
				exit;
		}
		
		
		
		
	}	
	
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
<script language="javascript">
function valid()
{
if(document.frm.email.value=="")
{
alert("Please enter email adress");
document.frm.email.focus();
return false;
}
}
</script>


<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
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
					<h2 class="alignleft">Password Recovery :: </h2>
					<a href="registration.php?carId=<?php echo $carId;?>" class="buy-btn">Sign Up with Us ?</a>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<form action=""  name="frm" id="name" method="post" enctype="multipart/form-data" onSubmit="return valid();">
	<table width="62%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="style1">Enter Email</span></td>
    <td>:</td>
    <td><input name="email" type="text" size="40"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
        <td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px; color:#FF0000" align="center"><?php if(isset($_REQUEST['msg'])){ echo "Invalid Login Details Plz Try agin...";} ?><?php if(isset($_REQUEST['msgSend'])){ echo "Password has been sent Plz Check mail...";} ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="submit" value="submit">    </td>
  </tr>
</table>
</form></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><tr>
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
					<div class="col">
						<h3 class="starter-ico"><a href="#">Starter Themes</a></h3>
						<p>Integer aliquam, quam vel tempor porta, dolor tortor cursus elit, sit amet ultrices ipsum metus quis aliquam, quam vel tempor porta</p>
						<a href="#" class="more">Read More</a>
					</div>
					<div class="col">
						<h3 class="awesome-ico"><a href="#">Awesome Colours</a></h3>
						<p>Integer aliquam, quam vel tempor porta, dolor tortor cursus elit, sit amet ultrices ipsum metus quis \aliquam, quam vel tempor porta</p>
						<a href="#" class="more">Read More</a>
					</div>
					<div class="col">
						<h3 class="save-ico"><a href="#">Save Time</a></h3>
						<p>Integer aliquam, quam vel tempor porta, dolor tortor cursus elit, sit amet ultrices ipsum metus quis aliquam, quam vel tempor porta</p>
						<a href="#" class="more">Read More</a>
					</div>

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