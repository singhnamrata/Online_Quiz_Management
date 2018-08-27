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
$sql="DELETE FROM contactus WHERE id = '".$id."'";
$rs=mysql_query($sql);
header("location:contactlist.php");
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
<table width="103%" border="0" align="right" cellpadding="2" cellspacing="0">
  <tr>
    <td class="btext">&nbsp;</td>
    <td colspan="5" class="btext" align="center">&nbsp;</td>
    <td align="center" class="btext">&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td colspan="5" class="btext" align="center">&nbsp;</td>
    <td align="center" class="btext">&nbsp;</td>
  </tr>
  <tr>
    <td width="13%" class="btext">&nbsp;</td>
    <td colspan="5" class="btext" align="center">Message View List </td>
    <td width="16%" align="center" class="btext">&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">Sr.No</td>
    <td width="14%" class="btext">Name</td>
    <td width="17%" class="btext">Mob No</td>
    <td width="13%" class="btext">EmailId</td>
    <td width="23%" class="btext">Message</td>
    <td width="4%" class="btext">Int Bank</td>
    <td>&nbsp;</td>
  </tr>
   <?php  
   // $sql="INSERT INTO contactus (id, name, mobno, emaiid, message, intBank, sendRegProperty) VALUES ('', '$name', $phone, '$email', '$msg', '$home_loan', '$send_alerts')";

   
   $sql="select * from contactus";
  $rs=mysql_query($sql);
 $i=1; while($row=mysql_fetch_array($rs)){
  ?>
 
 <tr>
    <td class="stext"><?php echo $i;?></td>
    <td class="stext"><?php echo $row['name'];?></td>
    <td class="stext"><?php echo $row['mobno'];?></td>
    <td class="stext"><?php echo $row['emaiid'];?></td>
    
	<td class="stext"><?php echo $row['message'];?></td>
	<td class="stext"><?php echo $row['intBank'];?></td>
    <td align="left" class="stext"><a href="contactlist.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete??');"><img src="images/delete-big.jpg" width="35" height="30"></a></td>
      </tr>
  <?php $i++; } ?>
</table>
</td></tr></table>
</div>
<!--<input type="text" name="userType" id="userType" value="User type" onFocus="(this.value == 'Enter Your type') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Enter Your type')" />
-->
</form>



<body>
</body>
</html>
