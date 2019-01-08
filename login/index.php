<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <?php
	 	  include('../includes/bankselect.php');
			$dbresult = mysql_query ("SELECT Title FROM sbtblstores",$dlink);
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




<div id="login-box">
<h2 style="color:#FFF"> <?php echo $Store['Title'] ?></h2><br />

<H2>ورود مدیر</H2><br />		    	<div class="p-title-mid"><?php
				if(isset($_GET['msg']))
                echo ($_GET['msg'] );
				else
				 echo'';
				?> </div>
                
<br />

			<div align="center" >
										<br/>

										<form action="loginchek2.php" method="post" name="frmlogin">
                                        	
                                        	<input name="username"   type="text" class="textbox"  value="نام کاربری" onfocus="clearText(this)" onblur="clearText(this)"/><br/>
                                            <input name="pass"  type="password"  class="textbox"  value="رمز عبور" onfocus="clearText(this)" onblur="clearText(this)"/><br/>
 <img src="../captchaphp/calledcaptcha.php"  width="90" height="30" style="margin:7px;" /><br />
<input  class="textbox" type="text" name="capcode"  value="کد بالا را وارد کنید" onfocus="clearText(this)" onblur="clearText(this)"/>
<br /> 
 <input name="login" type="submit"  style=" background-image:url(images/login-box-backg.png);font-size:16px;font-family:Tahoma, Geneva, sans-serif;;width:65px;"  value="ورود" />
                                            
                                        </form>
                                        <br /><br />
                                         <a href="manage_remember.php?msg=ایمیل خود را وارد کرده و دکمه ارسال را بزنید" >رمز عبور را فراموش کرده اید؟</a>
			  </div>








</div>













</body>
</html>
