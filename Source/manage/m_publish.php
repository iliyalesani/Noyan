<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<body>
<?php
$post_id=$_GET['id'];
$action_type=$_GET['type'];
$typeback=$_GET['type_back'];
if(is_numeric($post_id) && is_numeric($action_type)  && is_numeric($typeback))
{

              include('includes/bankselect.php');
			  if($typeback==1)
						mysql_query("UPDATE  mtblpost SET  published =  '".$action_type."' WHERE  id =".$post_id,$dlink);
				else if($typeback==2)
						mysql_query("UPDATE  mtbldownload SET  published =  '".$action_type."' WHERE  id =".$post_id,$dlink);
				else if($typeback==10)
						mysql_query("UPDATE  mtblmovie SET  published =  '".$action_type."' WHERE  id =".$post_id,$dlink);
				else if($typeback==11)
						mysql_query("UPDATE  mtblaudio SET  published =  '".$action_type."' WHERE  id =".$post_id,$dlink);
						
}
else
{
	echo('
	<script type="text/javascript" >
window.location="../erorr404.php";
</script>');

	}
				

?>
 <script type="text/javascript" >
  window.location='manage.php?type=<?php echo($typeback);  ?>&msg=عملیات مورد نظر با موفقیت انجام شد';
  </script>
</body>
</html>