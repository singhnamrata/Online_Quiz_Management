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
$sql="DELETE FROM questions WHERE id = '".$id."'";
$rs=mysql_query($sql);
header("location:questionMgt.php");
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

<table width="1000" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="43" class="btext">&nbsp;</td>
    <td colspan="7" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;" align="center">Question View List </td>
    <td   align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold" colspan="5"><a href="addQuestion.php"><input name="bb" value="&nbsp;&nbsp;&nbsp;Add Question&nbsp;&nbsp;&nbsp;" type="button"></a></td>
  </tr>
  
  <tr>
    <td class="btext">Sr.No</td>
    <td width="138" class="btext">Ques. Name</td>
	    <td width="138" class="btext">Cat. Name</td>

    <td width="130" class="btext" align="center">Option1</td>
    <td width="171" class="btext" align="center">Option2</td>
    <!--    <td class="btext">Password</td>    
-->	
<td width="102" class="btext" align="center">Option3</td>
<td width="88" class="btext" align="center">Option4</td>
<td width="88" class="btext" align="center">Ans Option</td>

    <td class="btext" colspan="2" align="center">Action</td>
  </tr>
   <?php  
   // $sql="INSERT INTO contactus (id, name, mobno, emaiid, message, intBank, sendRegProperty) VALUES ('', '$name', $phone, '$email', '$msg', '$home_loan', '$send_alerts')";
  $sql="select * from questions";
  $rs=mysql_query($sql);
  $i=1; while($row=mysql_fetch_array($rs)){
  ?>
 
 <tr>
    <td class="stext" align="center"><?php echo $i;?></td>
    <td class="stext"><?php echo $row['question_name'];?></td>
<?php $sqlx="select * from category where catid='".$row['catid']."'";
$rsx=mysql_query($sqlx);
$rowx=mysql_fetch_array($rsx);?> 
	    <td width="138" class="btext"><?php echo $rowx['name'];?></td>

    <td class="stext" align="center"><?php echo $row['answer1'];?></td>
    <td class="stext" align="center"><?php echo $row['answer2'];?></td>
<!--    <td class="stext"><?php //echo $row['password'];?></td>
-->    <td class="stext" align="center"><?php echo $row['answer3'];?></td>
	 <td class="stext" align="center"><?php echo $row['answer4'];?></td>
	 	 <td class="stext" align="center"><?php echo $row['answer'];?></td>

    <td width="83"  align="center" class="stext"><a href="addQuestion.php?id=<?php echo $row['id']; ?>&m=edit"><img src="images/edit.png" width="35" height="30"></a></td>
	<td width="113" align="center" class="stext"><a href="questionMgt.php?id=<?php echo $row['id']; ?>&m=del" onClick="return confirm('Are you sure you want to delete??');"><img src="images/delete-big.jpg" width="35" height="30"></a></td>
    </tr>
  <?php $i++; } ?>
 </table>
</td></tr></table>
</form>



<body>
</body>
</html>
