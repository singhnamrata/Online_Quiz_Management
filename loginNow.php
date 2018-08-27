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
	 
		            header("Location:quiztestoption.php");
exit;
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
		
		
if(isset($_POST['submit'])){
   $file_name=$_FILES["profile"]["name"];
   $temp_name=$_FILES["profile"]["tmp_name"];
   //if($file_name!='')
   //move_uploaded_file($_FILES["catToUpload"]["tmp_name"],"images/" . $_FILES["profile"]["name"]) or die ("Failure to upload content");	
		$id=$_REQUEST['id'];
		
		$sqlIns="select * from quiz_users where email='$email' and password='$password' and flag='C'";
	    //exit;
		$rsIns=mysql_query($sqlIns);
		//$id=mysql_insert_id();
		$num=mysql_num_rows($rsIns);
		$row=mysql_fetch_array($rsIns);
		if($num>0)
		{
		$_SESSION['stdname']=$row['name'];
        $_SESSION['stdid']=$row['id'];
		header("location:quiztestoption.php");
		exit;
		}
		else
		{
				header("location:loginNow.php?msg=1");
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
if(document.frm.password.value=="")
{
alert("Please enter password");
document.frm.password.focus();
return false;
}
}
</script>


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
					<h2 class="alignleft" style="color:#FFFFFF">User Login :: </h2>
					<a href="registrationNow.php" class="buy-btn">Sign Up with Us ?</a>
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
    <td>User Id</td>
    <td>:</td>
    <td><input name="email" type="text"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
     <td>:</td>
    <td><input name="password" type="password"></td>
  </tr>
  <tr>
        <td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px; color:#FF0000" align="center"><?php if(isset($_REQUEST['msg'])){ echo "Invalid Login Details Plz Try agin...";} ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><!--<a href="forgotPass.php" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#FFFFFF">Forgot Password--></td>
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
</form>
</td>
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