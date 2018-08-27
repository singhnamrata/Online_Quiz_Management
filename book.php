<?php
require_once('include/connect.php');
//session_start();  
error_reporting(0);
session_start();
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
	
	
	if(isset($_POST['submit'])){
	$code=$couponCode;
	if(isset($code))
	{
	$sql="select * from coupon where code='$code'";
	$rs=mysql_query($sql);
	$rod=mysql_fetch_array($rs);
	$discount=$rod['discount'];
	$totPrice=$price-($price*$discount)/100;
	
	
	
    $sqlIns="INSERT INTO bookingdetails (id,clientId,carId,pickUpDate,pickUpTime,returnDate,returnTime,pickUpLocation,returnLocation,checkOut,actprice,totprice,code) VALUES (NULL, '$clientId','$carId','$pickUpDate','$pickUpTime','$returnDate','$returnTime','$pickUpLocation','$returnLocation','$checkOut','$price','$totPrice','$code')";
	
	}
	else
	{
	 $sqlIns="INSERT INTO bookingdetails (id,clientId,carId,pickUpDate,pickUpTime,returnDate,returnTime,pickUpLocation,returnLocation,checkOut,actprice,totprice,code) VALUES (NULL, '$clientId','$carId','$pickUpDate','$pickUpTime','$returnDate','$returnTime','$pickUpLocation','$returnLocation','$checkOut','$price','0','$code')";
	
	}
	
		//exit;
		$rsIns=mysql_query($sqlIns);
		header("location:bookingList.php");
		exit;
		
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Car Rental System</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>

 	
	
    <script src="js_p/jquery.min.js"></script>
    <script src="js_p/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="js_p/jquery.timepicker.css" />
    <script src="js_p/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="js_p/bootstrap-datepicker.standalone.css" />


    <script src="lib/jquery.ptTimeSelect.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/jquery.ptTimeSelect.css" />


    <script src="dist/datepair.js"></script>
    <script src="dist/jquery.datepair.js"></script>

	
	<script language="javascript">
function valid()
{
if(document.frm.pickUpDate.value=="")
{
alert("Please enter pickUpDate");
document.frm.pickUpDate.focus();
return false;
}
if(document.frm.returnDate.value=="")
{
alert("Please Enter returnDate");
document.frm.returnDate.focus();
return false;
}
if(document.frm.pickUpLocation.value=="")
{
alert("Please Enter pickUpLocation");
document.frm.pickUpLocation.focus;
return false;
}
if(document.frm.returnLocation.value=="")
{
alert("Please Enter returnLocation");
document.frm.returnLocation.focus();
return false;
}
if(document.frm.checkOut.value=="")
{
alert("Please Enter checkOut");
document.frm.checkOut.focus();
return false;
}
}
</script>

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
					<h2 class="alignleft">Services :: </h2>
<!--					<a href="#" class="buy-btn">Wanna Buy One ?</a>
-->					<div class="cl">&nbsp;</div>
					<!-- slider -->
					<div class="slider-holder">
						<span class="slider-shadow"></span>
	 				<form  method="post"  name="frm" id="frm" enctype="multipart/form-data" onSubmit="return valid();">
<input name="clientId" type="hidden" value="<?php echo $_SESSION['stdid']; ?>">
<input name="carId" type="hidden" value="<?php echo $carId;?>">

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
  <?php
  $sql="select * from car where id=$carId";
  $rs=mysql_query($sql);
  
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr><tr>
    <td>&nbsp;</td>
    <td>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
      
      <tr>
      <?php $row=mysql_fetch_array($rs);?>
        <td>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="cars/<?php echo $row['img'];?>" width="176" height="207"></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="22%">&nbsp;</td>
        <td width="18%">&nbsp;</td>
        <td width="43%">&nbsp;</td>
      </tr>

	  <tr>
	    <td>Client  Name </td>
	    <td style="font-weight:bold"><?php if(isset($_SESSION['stdname'])){ echo ucfirst($_SESSION['stdname']);}?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
		<tr>
        <td width="17%">&nbsp;</td>
        <td width="22%">&nbsp;</td>
        <td width="18%">&nbsp;</td>
        <td width="43%">&nbsp;</td>
      </tr>
	  <tr>
	    <td>Address</td>
	    <td style="font-weight:bold">
		
		<?php if(isset($_SESSION['stdname'])){
		
				$id=$_SESSION['stdid'];
		$s="select * from client where id='$id'";
		$r=mysql_query($s);
		$ro=mysql_fetch_array($r);
		echo $ro['address'];		
				
				 } ?>		</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>Car Type </td>
	    <td><?php echo $row['cartype']; ?></td>
	    <td>Car Model </td>
	    <td><?php echo $row['cmodel']; ?></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>Registration No </td>
	    <td><?php echo $row['regno'];?></td>
	    <td>Car Price Hour/Day Rs </td>
	    <td><?php echo $row['cpriceperhour'];?>&nbsp;/&nbsp;<?php echo $row['cpriceperday'];?></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
        <td>PickUpDate</td>
        <td>
  <p id="basicExample">
  <input type="text" name="pickUpDate" class="date start" />	  					
  </p>       </td>
        <td>Time</td>
        <td>
		<p id="basicExample">
        <input type="text" name="pickUpTime" class="time start" />
        </p>       </td>
      </tr>


      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Return Date</td>
        <td>
  <p id="basicExample1">
  <input type="text" name="returnDate" class="date start" />	  					
  </p>       </td>
        <td>Time</td>
        <td>
		<p id="basicExample1">
        <input type="text" name="returnTime" class="time start" />
        </p>       </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php
  $sloc="select * from carlocation";
  $rsloc=mysql_query($sloc);
  //echo $clocation;
  ?>
      <tr>
        <td>PickUp Location </td>
        <td><select name="pickUpLocation">
	<option value="">--- Select Location -----</option>
	<?php while($roloc=mysql_fetch_array($rsloc)){ ?>
	<option value="<?php echo $roloc['name']; ?>" <?php if($roloc['name']==$clocation){ echo "selected";} ?>><?php echo $roloc['name']; ?></option>
	<?php } ?>
	</select></td>
	<?php
  $sloc1="select * from carlocation";
  $rsloc1=mysql_query($sloc);
  //echo $clocation;
  ?>
        <td>Return Location </td>
        <td><select name="returnLocation">
	<option value="">--- Select Location -----</option>
	<?php while($roloc1=mysql_fetch_array($rsloc1)){ ?>
	<option value="<?php echo $roloc1['name']; ?>" <?php if($roloc1['name']==$clocation){ echo "selected";} ?>><?php echo $roloc1['name']; ?></option>
	<?php } ?>
	</select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>Price</td>
        <td><input name="price" type="text" size="10" value="<?php echo $row['cpriceperday'];?>" readonly>Rs.</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Check Out</td>
        <td><select name="checkOut">
	<option value="">--- Select Pay -----</option>
	<option value="Cash">Cash</option>
	<option value="Paypal">Paypal</option>

	</select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
        <td>Coupon Code(if avalable)</td>
        <td><input name="couponCode" type="text" size="10"><span style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px; color:#FF0000">Plz Enter Coupon Code If avalable</span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr><tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
	  
     <!-- <tr>
        <td>&nbsp;</td>
        <td>* Example:
 <input type="text" name="date" id="date" />
 &nbsp;</td>
        <td><p id="basicExample">
                    <input type="text" class="date start" />
                    <input type="text" class="time start" /> to
                    <input type="text" class="time end" />
                    <input type="text" class="date end" />
                </p>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>-->
    </table></td>
	

            <script>
                $('#basicExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                $('#basicExample .date').datepicker({
                    'format': 'd-m-yyyy',
                    'autoclose': true
                });

                var basicExampleEl = document.getElementById('basicExample');
                var datepair = new Datepair(basicExampleEl);
				
				
				
				
				
				
				
				 $('#basicExample1 .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                $('#basicExample1 .date').datepicker({
                    'format': 'd-m-yyyy',
                    'autoclose': true
                });

                var basicExampleEl1 = document.getElementById('basicExample1');
                var datepair = new Datepair(basicExampleEl1);

				
            </script>
  </tr>
  <tr>
    <td width="22%">&nbsp;</td>
	<td width="78%" align="center">
	  <input type="submit" name="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" value="Reset">	</td>
  </tr>
 
 
  
  <tr>
    <td  style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold">&nbsp;</td>
  <td></td>
  </tr>
  
  <tr>
    <td  style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold">&nbsp;</td>
  <td></td>
  </tr>
  <tr>
     <td  style="font-family:'Times New Roman', Times, serif; font-size:12px; text-decoration:none; font-weight:bold"><a href="login.php?carId=<?php echo $row['id']; ?>" style="text-decoration:none"><!--<input name="bb" value="&nbsp;&nbsp;&nbsp;Book Now&nbsp;&nbsp;&nbsp;" type="button">--></a></td>
  <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

		
		
		</td>
       
      </tr>
    </table>

	
	
	</td>
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
  
</table>
</form>
					</div>	
				<!-- end of slider -->
				</section>
				<!-- slider-holder -->
				<!-- cols -->
				<section class="cols">
															<?php include('midsection.php'); ?>

					<div class="cl">&nbsp;</div>
				</section>
				<!-- end of cols -->

				<!-- featured -->
				<?php include('fetures.php'); ?>
<!-- end of featured -->
			</div>
			<!-- end of main -->
		</div>
		<!-- end of shell -->
		<div id="footer-push"></div>
	</div>	
	<!-- footer -->
					<?php include('footer.php');?>
<script type="text/javascript">
  		calendar.set("date");
  </script>
	<!-- end of footer -->
</body>
</html>