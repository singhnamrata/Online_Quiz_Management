<?php 
require_once('../include/connect.php');
//session_start();
if(isset($_POST['submit'])){
$userid = trim($_POST['userid']);
$password =trim($_POST['password']);
 
							  $query="select * from user where uid='".$userid."' and pwd='".$password."'";						
							 							$pass=mysql_query($query);
							
							$nums=mysql_num_rows($pass);
							if($nums!=0)
							{
							
							while($res=mysql_fetch_assoc($pass))
							{
								@extract($res);
								ob_start();
								session_start();
								$sess_val = session_id();		
								
											
								$_SESSION['userid_name'] = base64_encode($userid);
								//$_SESSION['admin_name'] = $ic_name;
								
							}

header("location:home.php");
exit;
}
else
{
header("location:index.php?msg=Login Fail Plz try again");
exit;
}

}


  

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> Login</title>
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
	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Admin::Quiz Management System</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->



<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #563c55 url(images/blurred.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>

   
</head>
<body>
<div class="container">
		
			<!-- Codrops top bar -->
            
			<header>
			
				<h1>Admin Login <strong> Form</strong> </h1>
				<h2></h2>
				
				

				
				
			</header>
			
			<section class="main">
					<form class="form-3" method="post">
				    <p class="clearfix">
				        <label for="login">Username</label>
										        <input name="userid" id="userid"  required="" type="text" value="Username" onFocus="(this.value == 'Username') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Username')">
				    </p>
				    <p class="clearfix">
				        <label for="password">Password</label>
											        <input name="password" id="password"  value="Password" required="" type="password" onFocus="(this.value == 'Password') && (this.value = '')" onBlur="(this.value == '') && (this.value = 'Password')"> 
				    </p>
				    <p class="clearfix">
				        <input type="checkbox" name="remember" id="remember">
				        <label for="remember">Remember me</label>
				    </p>
										<p class="clearfix" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px; color:#FF0000" align="center"><?php if(isset($_REQUEST['msg'])){echo $msg=$_REQUEST['msg'];}?></p>

				    <p class="clearfix">
				        <input type="submit" name="submit" value="Sign in">
				    </p>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					       
				</form>​
			</section>
			
        </div>
</body>
</html>
