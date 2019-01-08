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

	                include('includes/bankselect.php');
						$sql="INSERT INTO  `mtblsubmenu` (
`id` ,
`parentid` ,
`parent` ,
`title`,
`keywords`,
`description`,
`link`
)
VALUES (
NULL ,  '".$_POST['group']."', '".$_POST['parent_subject']."', '".$_POST['titr']."',  '".$_POST['keywords']."',  '".$_POST['description']."',  '');";

						 mysql_query($sql,$dlink);
						 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=3&msg=موضوع مورد نظر با موفقیت ثبت شد';
  </script>		 
  <?php
}
else
{							 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=3&msg=خطا';
  </script>		 
  <?php
}
?>
</body>
</html>