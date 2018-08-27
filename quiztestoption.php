<?php
require_once('include/connect.php');
session_start();  
//error_reporting(0);
//session_start();
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	//require_once('include/functions_list.php');
	//include('quiz.php');
 	 if(isset($_SESSION['stdname'])){
	// header("Location:quiztest.php");
	//exit;
           // $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
		else
		{
		header("Location:loginNow.php");
        exit;
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
					<h2 class="alignleft" style="color:#FFFFFF">Quiz Test :: </h2>
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
  </tr>
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
    <td>
	
	<!--<table width="100%" border="0" cellspacing="0" cellpadding="2">
      
 
		
		
		    </table>
-->
<?php $response=mysql_query("select * from category");?>

<form method='post' id='quiz_form' name="quiz_form">
<table width="440" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="182">&nbsp;</td>
    <td width="244">&nbsp;</td>
  </tr>

  <tr>
    <td style="color:#FFFFFF; font-weight:bold; font-size:14px; font-weight:bold">Test Category Name&nbsp;&nbsp;&nbsp; ::</td>
    <td><select name="catid" onChange="document.quiz_form.action='quiztest.php'; document.quiz_form.submit();" style="white-space:30px; height:30px; border:1px solid; color:#000099">
	<option value="">Select Quiz Type</option>
	  <?php while($result=mysql_fetch_array($response)){ ?>
   <option value="<?php echo $result['catid'];?>"><?php echo $result['name']; ?></option>
     <?php }?>

	</select></td>
  </tr>

</table>

</form>



	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><!--<div id="demo1" class="demo" style="text-align:center;font-size: 25px;">00:00:00</div>--></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="result" style="text-align:center;font-size: 25px; color:#FFFFFF"></div></td>
    <td>&nbsp;</td>
  </tr>
  
</table>

					</div>	
				<!-- end of slider -->
				</section>
				<!-- slider-holder -->
				<!-- cols -->
				<section class="cols">
										<?php //include('midsection.php'); ?>


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
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/watch.js"></script>
<script>
$(document).ready(function(){
	//$('#demo1').stopwatch().stopwatch('start');
	var steps = $('form').find(".questions");
	var count = steps.size();
	steps.each(function(i){
		hider=i+2;
		if (i == 0) { 	
    		$("#question_" + hider).hide();
    		createNextButton(i);
        }
		else if(count==i+1){
			var step=i + 1;
			//$("#next"+step).attr('type','submit');
            $("#next"+step).on('click',function(){
			
			   submit();
                
            });
	    }
		else{
			$("#question_" + hider).hide();
			createNextButton(i);
		}
		
	});
    function submit(){
	     $.ajax({
						type: "POST",
						url: "ajax.php",
						data: $('form').serialize(),
						success: function(msg) {
						  $("#quiz_form,#demo1").hide();
						  $('#result').show();
						  $('#result').append(msg);
						}
	     });
	
	}
	function createNextButton(i){
		var step = i + 1;
		var step1 = i + 2;
        $('#next'+step).on('click',function(){
        	$("#question_" + step).hide();
        	$("#question_" + step1).show();
        });
	}
	/*setTimeout(function() {
	      submit();
	}, 50000);
*/});
</script>

</body>
</html>