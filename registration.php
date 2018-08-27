<?php
require_once('include/connect.php');
//session_start();  
error_reporting(0);
session_start();
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	
	  if(isset($_SESSION['stdid'])){
	 $sql="select * from client where id='".$_SESSION['stdid']."'";
$rs=mysql_query($sql);
$ro=mysql_fetch_array($rs);
if($ro['flag']=='C'){
		            header("Location:book.php?carId=$carId");
exit;
}
else
{
		            header("Location:bookAvl.php?carId=$carId");
exit;
}
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
		
		
if(isset($_POST['submit'])){
   $file_name=$_FILES["profile"]["name"];
   $temp_name=$_FILES["profile"]["tmp_name"];
   //if($file_name!='')
   //move_uploaded_file($_FILES["catToUpload"]["tmp_name"],"images/" . $_FILES["profile"]["name"]) or die ("Failure to upload content");	
		$id=$_REQUEST['id'];
		if(isset($_REQUEST['id']) && $id !='')
		{
		 $sqlup="update client set name='$name',address='$address',email='$email',password='$password',mobileno='$mobileno' where id='$id'";
		
		//exit;
		$rs=mysql_query($sqlup);
		header("location:registration.php");
		exit;
		
		}
		else
		{
		$sqlIns="INSERT INTO client (id, name, address, email, password, mobileno,flag) VALUES (NULL, '$name', '$address', '$email', '$password', '$mobileno','C')";
	    //exit;
		$rsIns=mysql_query($sqlIns);
		$id=mysql_insert_id();
		$_SESSION['stdname']=$name;
        $_SESSION['stdid']=$id;
		header("location:book.php?carId=$carId");
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
if(document.frm.name.value=="")
{
alert("Please enter name");
document.frm.name.focus();
return false;
}
if(document.frm.email.value=="")
{
alert("Please enter email adress as Username");
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
					<h2 class="alignleft">Registration :: </h2>
					<a href="login.php?carId=<?php echo $carId; ?>" class="buy-btn">Login ?</a>
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
    <td>Name</td>
    <td>:</td>
    <td><input name="name" type="text"></td>
  </tr>  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td><textarea name="address" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mobile No</td>
      <td>:</td>
    <td><input name="mobileno" type="text"></td>
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