<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<body>
<?php
$post_id=$_GET['id'];
$id_back=$_GET['id_back'];
$type_back=$_GET['type_back'];
if(is_numeric($post_id)  && is_numeric($id_back) && is_numeric($type_back) )
{
include('includes/bankselect.php');
						mysql_query("delete from  mtblcomment WHERE  id =".$post_id,$dlink);
						
}
else
{
	echo('
	<script type="text/javascript" >
window.location="../erorr404.php";
</script>');

	}
				
if ($type_back==1)
   echo ('<script type="text/javascript" >  window.location="mvp.php?id='. $id_back .'&msg=نظر مورد نظر حذف شد";  </script>');
else if ($type_back==2)
   echo ('<script type="text/javascript" >  window.location="mvd.php?id='. $id_back .'&msg=نظر مورد نظر حذف شد";  </script>');
else if ($type_back==3)
   echo ('<script type="text/javascript" >  window.location="mviewcoment.php?page_type=1&msg=نظر مورد نظر حذف شد";  </script>');
else if ($type_back==4)
   echo ('<script type="text/javascript" >  window.location="mviewcoment.php?page_type=2&msg=نظر مورد نظر حذف شد";  </script>');
   
   
   
   
  
  ?>
</body>
</html>