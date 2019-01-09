<?php
session_start();
function clean($str) {
$str = @trim($str);
$str =str_replace("'","",$str);
return $str;
}
if(isset($_POST['capcode']) && md5($_POST['capcode'])==$_SESSION['randomnr2'])
{
$user= clean($_POST['username']);
$pass=clean($_POST['pass']);
include('../manage/includes/bankselect.php');
	$sql="SELECT * FROM sbtblstores WHERE UserName = '".$user."' AND Password ='".$pass."' ";
	//echo $sql;
	$dbresult = mysql_query($sql ,$dlink);
	$count = mysql_num_rows($dbresult);
	
	if ($count > 0)
	{
		$_SESSION['Logedin'] = 1;
			//header("Location: manage/manage.php?msg=خوش آمدید&type=1");
			?>
              <script type="text/javascript" >
				window.location='../manage/manage.php?msg=خوش آمدید&type=0';
			  </script>
            <?php
	  }
	  else 
	  {
		  //header("Location: login.php?msg=کلمه عبور یا نام کاربری اشتباه است");
			  ?>
				<script type="text/javascript" >
				  window.location='index.php?msg=کلمه عبور یا نام کاربری اشتباه است';
				</script>
			  <?php
	  }  
	}
	else 
	{
			?>
              <script type="text/javascript" >
				window.location='index.php?msg=کد عددی را به صورت صحیح وارد کنید';
			  </script>
            <?php
    } 

?>

<body>
</body>
</html>