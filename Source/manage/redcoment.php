<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<body>
<?php
$post_id=$_GET['id'];
$typeback=$_GET['type_back'];
if(is_numeric($post_id)   && is_numeric($typeback))
{

              include('includes/bankselect.php');
						mysql_query("UPDATE  mtblcomment SET  readed =1 WHERE  id =".$post_id,$dlink);
						
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
  window.location='mviewcoment.php?page_type=<?php echo($typeback);  ?>';
  </script>
</body>
</html>