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
  // $file_name=$_FILES["catToUpload"]["name"];
   //$temp_name=$_FILES["catToUpload"]["tmp_name"];
   //if($file_name!='')
   //move_uploaded_file($_FILES["catToUpload"]["tmp_name"],"../cars/" . $_FILES["catToUpload"]["name"]) or die ("Failure to upload content");	
		$id=$_REQUEST['id'];
		if(isset($_REQUEST['id']) && $id !='')
		{
		 $sqlup="update quiz_users set name='$name',address='$address',email='$email',password='$password',mobileno='$mobileno',flag='C' where id='$id'";
		
		//exit;
		$rs=mysql_query($sqlup);
		header("location:userMgt.php");
		exit;
		
		}
		else
		{
		 $sqlIns="INSERT INTO quiz_users (id, name, address, email, password, mobileno,flag) VALUES (NULL, '$name', '$address', '$email', '$password', '$mobileno','C')";
		//exit;
		$rsIns=mysql_query($sqlIns);
		header("location:userMgt.php");
		exit;
		} 
	}	
		
		
if(isset($_REQUEST['m']))
{
$id=$_REQUEST['id'];
$sql="select * from quiz_users where id='$id'";
$rs=mysql_query($sql);
$rx=mysql_fetch_array($rs);
$name=$rx['name'];
$address=$rx['address'];
$email=$rx['email'];
$password=$rx['password'];
$mobileno=$rx['mobileno'];
}
else
{
$name="";
$address="";
$email="";
$password="";
$mobileno="";
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
alert("Please Enter User Id...");
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

    <td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;color:#FFFFFF;">Add User </td>
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
    <td class="btext"><input name="id" type="hidden" value="<?php echo $_REQUEST['id'] ?>"></td>
    <td></td>
    <td class="btext">Name</td>
    <td class="btext"><input name="name" type="text" id="name" value="<?php echo $name;?>"/></td>
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
    <td class="btext">City</td>
    <td class="btext"><input name="address" type="text" id="address" value="<?php echo $address;?>"/></td>
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
    <td class="btext">User Id </td>
    <td class="btext"><input name="email" type="text" id="email" value="<?php echo $email;?>"/></td>
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
    <td class="btext">Password</td>
    <td class="btext"><input name="password" type="text" id="password" value="<?php echo $password;?>"/></td>
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
    <td class="btext">Mobile No </td>
    <td class="btext" valign="top"><input name="mobileno" type="text" id="mobileno" value="<?php echo $mobileno;?>"/></td>
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
