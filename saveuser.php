<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();
	    $error='';
if(isset($_GET['capcode']) && md5($_GET['capcode'])==$_SESSION['randomnr2'])
{

		 if (! (isset ($_GET['name'])))
		 $error='نام خود را وارد کنید';
		 elseif (! isset ($_GET['username']) || empty($_GET['username']))
		 $error='نام کاربری را وارد کنید';
		 elseif (! isset ($_GET['email']) || empty($_GET['email']))
		 $error='ایمیل را وارد کنید';
		 elseif (! isset ($_GET['password']) || empty($_GET['password']))
		 $error='رمز عبور را وارد کنید';
		 elseif ( $_GET['password']!= $_GET['password2'])
		 $error='رمز عبور با تکرار آن مطابقت ندارد';
		if ($error=='')
		{
			    include('includes/bankselect.php');
			
			$name =clean( $_GET['name']);
			$username =clean( $_GET['username']);
			$email =clean( $_GET['email']);
			$password =clean( $_GET['password']);
			include_once('jdf.php');
			$shamsidate=jdate('Y/m/d');
			
			
							$sql="INSERT INTO  `mtbluser` (
`id` ,
`name` ,
`username` ,
`password` ,
`city` ,
`address` ,
`tel` ,
`mobil` ,
`type` ,
`confirm` ,
`enabled` ,
`mail` ,
`ad_code` ,
`sh_hesab` ,
`price` ,
`start_date` ,
`almasi_date` ,
`moaref`
)
VALUES (
NULL ,  '".$name."',  '".$username."',  '".$password."',  '',  '',  '',  '',  '',  '1',  '1',  '".$email."',  '',  '',  '0',  '".$shamsidate."',  '',  ''
);
";
						mysql_query($sql,$dlink);
						// echo $sql;
						echo 'ثبت نام با موفقیت انجام شد ، با تشکر';


		}
		else
		 echo $error;
}
else
{
	echo 'کد امنیتی را به طور صحیح وارد کنید';

}
			 ?>
       
