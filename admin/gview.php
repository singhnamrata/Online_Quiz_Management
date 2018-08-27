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
header("location:gview.php");
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
 
  
  <tr>
    <td colspan="6" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;" align="center">Gallery View </td>
    <td    align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold"><a href="gallery.php"> <input name="bb" value="Add Gallery" type="button"></a></td>
  </tr>
 
  <tr>
    <td  class="btext" align="center">Sr.No</td>
    <td  class="btext">Name</td>
    <td  class="btext"> Details </td>
    <td >&nbsp;</td>
    <td colspan="2" class="btext" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</td>
    </tr>
   <?php  $sql="select * from gallery";
  $rs=mysql_query($sql);
 $i=1; while($row=mysql_fetch_array($rs)){
  ?>
 
 <tr>
    <td class="stext" align="center"><?php echo $i;?></td>
    <td class="stext"><?php echo $row['name'];?></td>
        <td class="stext"><?php echo $row['details'];?></td>

	<td class="stext"><img src="../gimages/<?php echo $row['photo'];?>" width="60" height="50"></td>
    
    	<td width="8%"  align="center" class="stext"><a href="gallery.php?id=<?php echo $row['id']; ?>&m=edit"><img src="images/edit.png" width="35" height="30"></a></td>
  
	<td  align="center" class="stext"><a href="gview.php?id=<?php echo $row['id']; ?>&m=del" onClick="return confirm('Are you sure you want to delete??');"><img src="images/delete-big.jpg" width="35" height="30"></a></td>
  </tr>
  <?php $i++; } ?>
 </table>
</td>
</tr>
</table>
</div>
<!--<input type="text" name="userType" id="userType" value="User type" onFocus="(this.value == 'Enter Your type') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Enter Your type')" />
-->
</form>



<body>
</body>
</html>
