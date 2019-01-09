<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_POST['titr']))
{

$type_back=$_POST["type_back"];
$product_id=$_POST["product_id"];
	                include('includes/bankselect.php');
						$sql="update  `mtblsubmenu` set
`parentid` ='".$_POST['group']."' ,
`parent` ='".$_POST['parent_subject']."' ,
`title` = '".$_POST['titr']."',
`keywords` = '".$_POST['keywords']."',
`description` = '".$_POST['description']."'
    where id=".$product_id;

						 mysql_query($sql,$dlink);
						 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=موضوع مورد نظر با موفقیت ویرایش شد';
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