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
   $file_name=$_FILES["fileToUpload"]["name"];
   $temp_name=$_FILES["fileToUpload"]["tmp_name"];
  // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"images/" . $_FILES["fileToUpload"]["name"]) or die ("Failure to upload content");	


 if($file_name!='')
   move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../gimages/" . $_FILES["fileToUpload"]["name"]) or die ("Failure to upload content");	
	$id=$_REQUEST['id'];
		if(isset($_REQUEST['id']) && $id !='')
		{
		if($file_name!='')
		{
		 $sqlup="update gallery set name='$name',details='$d',photo='$file_name' where id='$id'";
		}
		else
		{
		  $sqlup="update gallery set name='$name',details='$d' where id='$id'";
		}
		$rs=mysql_query($sqlup);
		header("location:gview.php");
		exit;
		
		}
	
else
{
		$sqlIns="INSERT INTO gallery (id,name,details,photo) VALUES ('', '$name','$d','$file_name')";
		$rsIns=mysql_query($sqlIns);
		header("location:gview.php");
		exit;
		
} 
	}	
		
		
		if(isset($_REQUEST['m']))
{
$id=$_REQUEST['id'];
$sql="select * from gallery where id='$id'";
$rs=mysql_query($sql);
$rx=mysql_fetch_array($rs);
$name=$rx['name'];
$d=$rx['details'];
$fName=$rx['photo'];
}
else
{
$name="";
$d="";
$fName="";
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
<script language="javascript">
function valid()
{
if(document.frm.name.value=="")
{
alert("Please enter name");
document.frm.name.select;
return false;
}
}
</script>

</head>
<body>
				<form name="frm" id="frm"  method="post" enctype="multipart/form-data" onSubmit="return valid();">

<div class="container">
<?php include("tbl.php"); ?>

<table width="800px" border="0" align="center" cellpadding="2" cellspacing="0">
  
  <tr>
    <td class="btext">&nbsp;</td>
	    <td class="btext">&nbsp;</td>

    <td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;">Gallery System </td>
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
  <tr>
    <td class="btext">&nbsp;</td>
    <td><input name="id" type="hidden" value="<?php echo $_REQUEST['id'] ?>"></td>
    <td class="btext">Name</td>
    <td class="btext"><input name="name" type="text" id="name" value="<?php echo $name;?>" /></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Details</td>
    <td class="btext"><label>
      <textarea name="d"><?php echo $d;?></textarea>
    </label></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="btext">&nbsp;</td>
    <td></td>
    <td class="btext">Upload Photo </td>
    <td class="btext"><input type="file" name="fileToUpload" id="fileToUpload">&nbsp;&nbsp;<?php echo $fName;?></td>
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
    <td width="1%"></td>
    <td width="19%">&nbsp;</td>
    <td width="40%"><input type="submit" name="submit" id="submit" value="submit" class="btnsubmit" /> </td>
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
