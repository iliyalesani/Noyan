<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include_once('../jdf.php');
$shamsidate=jdate('Y/m/d');
$shamsitime=jdate('H:i:s');
if(isset($_POST['reciver']) || isset($_POST['msg']) )
{

	                include('includes/bankselect.php');
if(!isset($_POST['msg']))
{
$sql = "INSERT INTO  `mtblmessage` (
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
NULL ,  '0',  '".$_POST['reciver']."',  '".$_POST['titr']."',  '".$_POST['message']."',  '".$shamsidate."',  '".$shamsitime."',  '0'
);";
 mysql_query($sql,$dlink);
}
else
{
			 $dbResult = mysql_query("SELECT id FROM mtbluser where confirm=1 and enabled=1 ",$dlink);
				while($post = mysql_fetch_assoc ($dbResult) )
				{
					$sql = "INSERT INTO  `mtblmessage` (
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
NULL ,  '0',  '".$post['id']."',  '".$_POST['titr']."',  '".$_POST['message']."',  '".$shamsidate."',  '".$shamsitime."',  '0'
);";
 mysql_query($sql,$dlink);
				}	
}
						 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=0&msg=پیام شما ارسال شد';
  </script>		 
  <?php
}
else
{
							 ?>
  <script type="text/javascript" >
  window.location='manage.php?type=0&msg=خطا';
  </script>		 
  <?php

}
?>
</body>
</html>