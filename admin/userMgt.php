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
$sql="DELETE FROM quiz_users WHERE id = '".$id."' and flag='C'";
$rs=mysql_query($sql);
header("location:userMgt.php");
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

<table width="800px" border="0" align="center" cellpadding="2" cellspacing="0">
 <?php if(isset($_REQUEST['msend'])){ ?>
  <tr>
    <td class="btext">&nbsp;</td>
    <td colspan="9" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;color:#ccc;" align="center">Code has Been Send Check ur Box</td>
    <td   align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold" colspan="5">&nbsp;</td>
  </tr>
  <?php } ?>
  <tr>
    <td class="btext">&nbsp;</td>
    <td colspan="5" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;" align="center">Quiz User View List </td>
    <td   align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold" colspan="5"><a href="addUser.php"><input name="bb" value="&nbsp;&nbsp;&nbsp;Add User&nbsp;&nbsp;&nbsp;" type="button"></a></td>
  </tr>
  
  <tr>
    <td class="btext">Sr.No</td>
    <td class="btext">Name</td>
    <td class="btext">City</td>
    <td class="btext">User Id</td>
	    <td class="btext">Mobile</td>

<!--    <td class="btext">Password</td>    
-->	
    <td class="btext" colspan="2" align="center">Action</td>
  </tr>
   <?php  
   // $sql="INSERT INTO contactus (id, name, mobno, emaiid, message, intBank, sendRegProperty) VALUES ('', '$name', $phone, '$email', '$msg', '$home_loan', '$send_alerts')";
  $sql="select * from quiz_users where flag='C'";
  $rs=mysql_query($sql);
  $i=1; while($row=mysql_fetch_array($rs)){
  ?>
 
 <tr>
    <td class="stext" align="center"><?php echo $i;?></td>
    <td class="stext"><?php echo $row['name'];?></td>
    <td class="stext"><?php echo $row['address'];?></td>
    <td class="stext"><?php echo $row['email'];?></td>
	    <td class="stext"><?php echo $row['mobileno'];?></td>   
    <td  align="left" class="stext"><a href="addUser.php?id=<?php echo $row['id']; ?>&m=edit"><img src="images/edit.png" width="35" height="30"></a></td>
	<td align="left" class="stext"><a href="userMgt.php?id=<?php echo $row['id']; ?>&m=del" onClick="return confirm('Are you sure you want to delete??');"><img src="images/delete-big.jpg" width="35" height="30"></a></td>
      </tr>
  <?php $i++; } ?>
 </table>
</td></tr></table>
</form>



<body>
</body>
</html>
