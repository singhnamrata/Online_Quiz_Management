<?php 
require_once('../include/connect.php');
//session_start();  
error_reporting(0);
session_start();
//print_r($_SESSION);


        if(!isset($_SESSION['userid_name'])){
		            header('Location: index.php');
exit;
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        /*else if(isset($_REQUEST['userid_name'])){
                unset($_SESSION['userid_name']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }*/

if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
$sql="DELETE FROM gallery WHERE id = '".$id."'";
$rs=mysql_query($sql);
header("location:home.php");
exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
<style type="text/css">
.btnsubmit{float:left; padding:1px 10px; font-size:14px;}

.comboboxselect{
border:solid 1px #666666;
font-family:"Tahoma";
font-size:11px;
color:#333333;
letter-spacing:1px;
padding-left:5px;
height:20px;
width:20em;
}
.btext{font-family: verdana;font-size: 10px; font-weight:bold}
.stext{font-family: verdana;font-size: 10px;}

</style>
        <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>
<body>
				<form  method="post">

<div class="container">
<?php include("tbl.php"); ?>
</div>
<img src="../gimages/q1.jpg" width="542" height="421" border="0">
<!--<input type="text" name="userType" id="userType" value="User type" onFocus="(this.value == 'Enter Your type') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Enter Your type')" />
-->
                                                                                                                                                                                                                                </form>



<body>
</body>
</html>
