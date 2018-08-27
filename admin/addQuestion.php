<?php 
require_once('../include/connect.php');
//session_start();  
error_reporting(0);
session_start();
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}

//print_r($_SESSION);


        if(!isset($_SESSION['userid_name'])){
		            header('Location: index.php');
exit;
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
		
		
if(isset($_POST['submit'])){
//Create short variables
$question = $_POST['question_name'];
$ans1 = ($_POST['answer1']);
$ans2 = ($_POST['answer2']);
$ans3 = ($_POST['answer3']);
$ans4 = ($_POST['answer4']);
$cans = ($_POST['cans']);
$catid=$_POST['catid'];
   	
		$id=$_REQUEST['id'];
		if(isset($_REQUEST['id']) && $id !='')
		{
		 $sqlup="update questions set question_name='$question',answer1='$ans1',answer2='$ans2',answer3='$ans3',answer4='$ans4',answer='$cans' where id='$id'";
		
		//exit;
		$rs=mysql_query($sqlup);
		header("location:questionMgt.php");
		exit;
		
		}
		else
		{
$sqlIns = "INSERT INTO questions(id,catid, question_name, answer1, answer2, answer3, answer4,answer)
			 VALUES (NULL, '$catid','".$question."','".$ans1."','".$ans2."','".$ans3."','".$ans4."','".$cans."')";
		//exit;
		$rsIns=mysql_query($sqlIns);
		header("location:questionMgt.php");
		exit;
		} 
	}	
		
		
if(isset($_REQUEST['m']))
{
$id=$_REQUEST['id'];
$sql="select * from questions where id='$id'";
$rs=mysql_query($sql);
$rx=mysql_fetch_array($rs);
$name=$rx['question_name'];
$ans1=$rx['answer1'];
$ans2=$rx['answer2'];
$ans3=$rx['answer3'];
$ans4=$rx['answer4'];
$cans=$rx['answer'];

}
else
{
$name="";
$ans1="";
$ans2="";
$ans3="";
$ans4="";
$cans="";
}		
        /*else if(isset($_REQUEST['userid_name'])){
                unset($_SESSION['userid_name']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }*/

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
<script language="javascript">
function valid()
{
if(document.frm.name.value=="")
{
alert("Please enter name");
document.frm.name.select;
return false;
}
if(document.frm.email.value=="")
{
alert("Please Enter email address");
document.frm.email.focus;
return false;
}
if(document.frm.password.value=="")
{
alert("Please Enter password");
document.frm.password.focus;
return false;
}
}
</script>
</head>
<body>
 				<form  method="post"  name="frm" id="frm" enctype="multipart/form-data" onSubmit="return valid();">

<div class="container">
<?php include("tbl.php"); ?>

<table  width="800px" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td class="btext">&nbsp;</td>
	    <td class="btext">&nbsp;</td>

    <td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;">Add Question</td>
    <td></td>
    <td width="3%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
 <?php if(!isset($_REQUEST['m']))
       {       $response=mysql_query("select * from category");?>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Category Name</td>
    <td class="btext"><select name="catid">
	<option value="">Select Category Type</option>
	  <?php while($result=mysql_fetch_array($response)){ ?>
   <option value="<?php echo $result['catid'];?>"><?php echo $result['name']; ?></option>
     <?php }?>

	</select>
</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <?php } ?>
 
 
  <tr>
    <td class="btext"><input name="id" type="hidden" value="<?php echo $_REQUEST['id'] ?>"></td>
    <td></td>
    <td class="btext">Question</td>
    <td class="btext"><input name="question_name" type="text" class="form-control" id="question_name" value="<?php echo $name;?>" size="75">
</td>
    <td></td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">&nbsp;</td>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Answer 1</td>
    <td class="btext"><input name="answer1" type="text" class="form-control" id="answer1" value="<?php echo $ans1;?>" size="60">
</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>




  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">&nbsp;</td>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Answer 2 </td>
    <td class="btext"><input name="answer2" type="text" class="form-control" id="answer2" value="<?php echo $ans2;?>" size="60"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">&nbsp;</td>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Answer 3 </td>
    <td class="btext"><input name="answer3" type="text" class="form-control" id="answer3" value="<?php echo $ans3;?>" size="60"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">&nbsp;</td>
    <td class="btext" valign="top">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Answer 4 </td>
    <td class="btext"><input name="answer4" type="text" class="form-control" id="answer4" value="<?php echo $ans4;?>" size="60"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Correct Ans In Option Number </td>
    <td class="btext"><input name="cans" type="text" class="form-control" id="cans" value="<?php echo $cans;?>" size="60"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td class="btext">&nbsp;</td>
    <td width="3%"></td>
    <td width="13%">&nbsp;</td>
    <td width="44%"><input type="submit" name="submit" id="submit" value="submit" class="btnsubmit" /> </td>
    <td width="12%"></td>
    <td>&nbsp;</td>  
	  <td>&nbsp;</td>
  </tr>
</table>
</td></tr></table>
</div>
<!--<input type="text" name="userType" id="userType" value="User type" onFocus="(this.value == 'Enter Your type') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Enter Your type')" />
-->
</form>



<body>
</body>
</html>
