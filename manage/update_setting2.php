<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
include('includes/bankselect.php');

if(isset($_POST['submit']))
{
$type_back=$_POST["type_back"];
	                
$sql="UPDATE  `sbtblstores` SET  
`AboutUs` = '".$_POST['aboutus']."',
`ContactUs` = '".$_POST['contactus']."'
 WHERE  `ID` =1";


						 mysql_query($sql,$dlink);
						 ?>
	<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=تنظیمات مورد نظر با موفقیت انجام شد';
  </script>		 
  <?php
}
else
{
							 ?>
  <script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=خطا';
  </script>		 
  <?php

}
?>
</body>
</html>