<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();
if(isset($_GET['capcode']) && md5($_GET['capcode'])==$_SESSION['randomnr2'])
{
		if (isset ($_POST['name']));
		{
			     include('includes/bankselect.php');
			
			$name =clean( $_GET['name']);
			$email =clean( $_GET['email']);
			$comment =clean( $_GET['comment']);
include_once('jdf.php');
$shamsidate=jdate('Y/m/d');
$shamsitime=jdate('H:i:s');


				$sql="INSERT INTO  `mtblmessage` (
`ID` ,
`Sender` ,
`Reciver` ,
`Title` ,
`Text` ,
`SendDate` ,
`SendTime` ,
`Readed`
)
VALUES (
NULL ,  '-1','0', '".$name."',  '".$email.'<hr/>'.$comment."',  '".$shamsidate."',  '".$shamsitime."',   '0');";
			mysql_query($sql,$dlink);
			// echo $sql;
			echo 'پبام شما ارسال شد ، با تشکر';


		}
}
 else
{
	echo 'کد امنیتی را به طور صحیح وارد کنید';

}
			 ?>
       
