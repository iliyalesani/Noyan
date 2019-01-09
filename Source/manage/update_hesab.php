<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['price']))
{

$type_back=$_POST["type_back"];
$user_id=$_POST["product_id"];
	                include('includes/bankselect.php');
					if( $_POST['type']==1)
					{
						$sql="update  `mtbluser` set
					    price =price+ '".$_POST['price']."'  where id=".$user_id;
					}
					else if( $_POST['type']==2)
					{
						$sql="update  `mtbluser` set
					    price =price- '".$_POST['price']."'  where id=".$user_id;
					}
					 mysql_query($sql,$dlink);
					
					//  send message when admin wanted
					if(isset($_POST['msg']))
					{
						include_once('../jdf.php');
$shamsidate=jdate('Y/m/d');
$shamsitime=jdate('H:i:s');
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
NULL ,  '0',  '".$user_id."',  '".$_POST['titr']."',  '".$_POST['message']."',  '".$shamsidate."',  '".$shamsitime."',  '0'
);";
						
						
						}
						 mysql_query($sql,$dlink);
						 ?>
					<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=حساب مورد نظر با موفقیت ویرایش شد';
  </script>	 
  <?php
}
else
{							 ?>
					<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=خطا';
  </script>	 
  <?php
}
?>
</body>
</html>