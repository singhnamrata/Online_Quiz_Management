<script language="javascript">
function validation()
{
if(document.form.name.value=="")
{
alert("Please Enter Your Name...");
document.form.name.focus;
return false;
}
if(document.form.phone.value=="")
{
alert("Please Enter Your Mobileno...");
document.form.phone.focus;
return false;
}
if(document.form.phone.value=="Mobile No.")
{
alert("Please Enter Your Mobileno...");
document.form.phone.focus;
return false;
}
if(document.form.email.value=="")
{
alert("Please Enter Your email...");
document.form.email.focus;
return false;
}
if(document.form.email.value=="Email id")
{
alert("Please Enter Your email...");
document.form.email.focus;
return false;
}


if(document.form.msg.value=="")
{
alert("Please Enter Your msg...");
document.form.msg.focus;
return false;
}

}
</script>
<?php
foreach($_REQUEST as $key=>$value)
	{
		$$key=$value;
	}
if(isset($_POST['submit'])){


$home_loan = (isset($_POST['home_loan'])) ? $_POST['home_loan'] : '';
$send_alerts = (isset($_POST['send_alerts'])) ? $_POST['send_alerts'] : '';



 $sql="INSERT INTO contactus (id, name, mobno, emaiid, message, intBank, sendRegProperty) VALUES ('', '$name', $phone, '$email', '$msg', '$home_loan', '$send_alerts')";
$rs=mysql_query($sql);
//header("location:contact-us.php?m=1");
//exit;


$to = $email;
$subject = "By Owner";
$txt = "Name:".''.$name.',MobileNo:'.$phone.',EmailId:'.$email.'<br>'.$msg;
$headers = "From: owner@example.com";
mail($to,$subject,$txt,$headers);


}
?>
<div id="content-widget-31" class="contactFormWrap widget wp-content">
            <div class="hdWrapper">
              <h1 class="formh1">Yes! I am Interested</h1>
              <div class="description formC">
                <form action="" name="form" id="form" method="post" enctype="multipart/form-data" onSubmit="return validation();">
                  <table border="0" cellpadding="0" cellspacing="0" hspace="0" vspace="0" width="210">
                    <tbody>
                      <tr>
                        <td><input name="name" type="text" required="true" valtype="name" value="Name" class=""  ></td>
                      </tr>
                      <tr>
                        <td><div class="rightt">
                            <input name="phone" onkeypress="return eoiMgr.isNumber(event)" maxlength="13" type="text" valtype="phmob" required="true" value="Mobile No." class="" >
                          </div></td>
                      </tr>
                      <tr>
                        <td><input name="email" type="text" valtype="email" required="true" value="Email id" class="" ></td>
                      </tr>
                      <tr>
                        <td><textarea    name="msg" cols="25" rows="2" valtype="msg" nameinerr="Message" required="true" value="*Write your message:" class="formlabel">*Write your message:</textarea></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td width="20" align="left"><label for="home_loan">
                                    <input type="checkbox" id="home_loan" name="home_loan" value="Y" checked="checked">
                                  </label></td>
                                <td class="ft">I am interested in Bank Loan</td>
                              </tr>
                            </tbody>
                          </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td valign="top"><label for="send_alerts">
                                    <input type="checkbox" checked="" id="send_alerts" value="Y" name="send_alerts">
                                  </label></td>
                                <td class="ft">Send regular Property Alerts and share my contact details with 99acres clients.</td>
                              </tr>
                            </tbody>
                          </table></td>
                      </tr>
                      <tr>
                        <td height="10"></td>
                      </tr>
                      <tr>
                        <td><input value="Send Email &amp; SMS" type="submit" class="submitmail" name="submit" id="submit"></td>
                      </tr>
                      <tr>
                        <td height="10"></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>