<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <?php
	 	  include('../includes/bankselect.php');
			$dbresult = mysql_query ("SELECT * FROM sbtblstores",$dlink);
			$Store = mysql_fetch_assoc($dbresult);
		?>	
<title> <?php echo $Store['Title'] ?></title>

<link href="login-box.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>

<body>
<?php 
$msg="";
if(isset($_POST['capcode']) && md5($_POST['capcode'])==$_SESSION['randomnr2'])
{
if(isset($_POST['submit']))
{

	$dbresult= mysql_query("select * from sbtblstores where ManagerMail='".$_POST['email']."'",$dlink);
	$count=mysql_num_rows($dbresult);
	$result=mysql_fetch_assoc($dbresult);
	if($count>0 )
	{   	        
//===========================send email==============================
$email=$result['ManagerMail'];

            // send email
            
            $to =  $email;
            $subject ='فراموشی رمز عبور _ '.$result['Title'];
            $from = $result['ManagerMail'];
            
            $body = "\n  رمز عبور و نام کاربری شما:\n".
            "\n user:".$result['UserName'].
			 "\n pass:".$result['Password'];
            
            
            $headers = "From: $from \r\n";
            
            mail($to, $subject, $body, $headers);
						 
//===========================send email==============================
          $msg="  یادآوری برای ایمیل شما ارسال شد ، لطفا اسپم های خود را نیز چک کنید";
	 
	}
	else
	{
	      $msg="ایمیل وارد شده اشتباه است";
	}
 
}
		}
	else 
	{
			      $msg="کد عددی را به صورت صحیح وارد کنید";
    }

?>



<div id="login-box">
<h2 style="color:#FFF"> <?php echo $Store['Title'] ?></h2><br />

<H2>ایمیل خود را وارد کرده و دکمه ارسال را بزنید</H2><br />		
	    	<div class="p-title-mid"  style="color:#FF0">
				<?php
				if($msg != "")
                  echo ($msg);
				?> 
                </div>
                
<br /><br />

			<div align="center" >
										<br/>
<div  class="form">
    		<form id="contactform"  method="post" style="direction:rtl;"> 
    			<input id="email" name="email" title="لطفا آدرس ایمیل را به صورت صحیح وارد کنید" placeholder="example@domain.com"  style="width:400px; font-size:18px;font-family:Tahoma, Geneva, sans-serif;"  tabindex="2" type="email"> 
    <br/>
 <img src="../captchaphp/calledcaptcha.php"  width="90" height="30" style="margin:7px;" /><br />
<input  class="textbox" type="text" name="capcode"  value="کد بالا را وارد کنید" onfocus="clearText(this)" onblur="clearText(this)"/>
<br />                    
            <input class="buttom" name="submit" id="submit"  tabindex="6"  style="width:200px; font-size:18px;font-family:Tahoma, Geneva, sans-serif;" value="ارسال" type="submit"> 	 
   </form> <br />
<br />
<br />
<br />

    <a href="index.php" >ورود به سایت</a>
</div> 
			  </div>








</div>













</body>
</html>
