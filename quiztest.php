<?php
require_once('include/connect.php');
session_start();
//print_r($_SESSION);  
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
<?php $response=mysql_query("select * from questions where catid='$catid'");?>

<form method='post' id='quiz_form'>
<input name="catid" type="hidden" value="<?php echo $catid; ?>">

<?php $i=1;while($result=mysql_fetch_array($response)){ ?>
<div id="question_<?php echo $i;?>" class='questions'>
<h2 id="question_<?php echo $i;?>" style="color:#ffffff"><?php echo $i.".".$result['question_name'];?></h2><br>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans1_<?php echo $i;?>' for='1'><?php echo $result['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans2_<?php echo $i;?>' for='1'><?php echo $result['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans3_<?php echo $i;?>' for='1'><?php echo $result['answer3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans4_<?php echo $i;?>' for='1'><?php echo $result['answer4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
</div>
<br/>
<input type="button" id='next<?php echo $i;?>' value='Next!' name='question' class='butt'/>
</div>
<?php $i++; }?>
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
	//alert(count); 
	steps.each(function(i){
	//alert(i);
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