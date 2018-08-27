<?php
require_once('include/connect.php');
//session_start();  
error_reporting(0);
session_start();
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	
	 if(isset($_SESSION['stdname'])){
		            header('Location: book.php');
exit;
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
		 $sqlup="update quiz_users set name='$name',address='$address',email='$email',password='$password',mobileno='$mobileno',flag='C' where id='$id'";
		
		//exit;
		$rs=mysql_query($sqlup);
		header("location:registrationNow.php");
		exit;
		
		}
		else
		{
		$sqlIns="INSERT INTO quiz_users (id, name, address, email, password, mobileno,flag) VALUES (NULL, '$name', '$address', '$email', '$password', '$mobileno','C')";
	    //exit;
		$rsIns=mysql_query($sqlIns);
		$id=mysql_insert_id();
		$_SESSION['stdname']=$name;
        $_SESSION['stdid']=$id;
		header("location:quiztestoption.php");
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
var phoneReg = /^[0-9\-\+]+$/;
var phone=$("#mobileno").val();
var x=$("#mobileno").val();

if(document.frm.name.value=="")
{
alert("Please enter name");
document.frm.name.focus();
return false;
}

if(document.frm.address.value=="")
{
alert("Please Enter City...");
document.frm.address.focus();
return false;
}

if(document.frm.email.value=="")
{
alert("Please enter userId...");
document.frm.email.focus();
return false;
}
if(document.frm.password.value=="")
{
alert("Please enter password");
document.frm.password.focus();
return false;
}
if(document.frm.password.value.length<6)
{
alert("Please enter password minimum six charecter");
document.frm.password.focus();
return false;
}



if($("#mobileno").val()=='')
		{
			alert("Please Enter Your mobile No");
			$("#mobileno").focus();
			return false;
		}
		if($("#mobileno").val()=='0')
		{
			alert("Please Enter Your mobile No");
			$("#mobileno").focus();
			return false;
		}
		
		 if(!phoneReg.test(phone)) {
	 	alert("Please Enter The number in correct format");
		$("#mobileno").focus();
		return false;
        }
		
if (x.length < 10){
                alert("enter 10 digits mobile Number");
				$("#mobileno").focus();
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
					<h2 class="alignleft" style="color:#FFFFFF">User Registration :: </h2>
					<a href="loginNow.php?" class="buy-btn">Login Now</a>
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
    <td>City</td>
    <td>:</td>
    <td><input name="address" type="text"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>User Id </td>
    <td>:</td>
    <td><input name="email" type="text" value="<?php echo "user".rand (10,100); ?>"></td>
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
    <td><input name="mobileno" id="mobileno" type="text"></td>
   </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
 <!-- <tr>
    <td class="btext">License No. </td>
    <td>:</td>

    <td class="btext"><input name="lic" type="text" id="lic"/></td>
  </tr>
  
  <tr>
    <td class="btext">&nbsp;</td>
    <td>&nbsp;</td>
    <td class="btext">&nbsp;</td>
  </tr>
  <tr>
    
    <td class="btext">Year of Experiacne </td>
        <td>:</td>

	<td class="btext"><input name="exp" type="text" id="exp"/></td>
    </tr>-->
  
  
  
  
  
  
  
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