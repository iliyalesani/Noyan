<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<body>
<?php
if (isset($_POST['postid']))
{
$post_id=$_POST['postid'];
$typeback=$_POST['type_back'];
if(is_numeric($post_id)   && is_numeric($typeback))
{

              include('includes/bankselect.php');
			  if ($_POST['selected']=="1")
						mysql_query("UPDATE  mtbldownload SET  name =  'vizhe' WHERE  id =".$post_id,$dlink);
			   else
						mysql_query("UPDATE  mtbldownload SET  name =  '' WHERE  id =".$post_id,$dlink);
						
}
else
{
  //header("Location: ../erorr404.php");
    ?>
              <script type="text/javascript" >
				window.location='../erorr 404.php';
			  </script>
          <?php
}
	
}
//header("Location: manage.php?type=".$typeback."&msg=دانلود ویژه انتخاب شد");
?>
             <script type="text/javascript" >
				window.location='manage.php?type=<?php echo $typeback ?>&msg=دانلود ویژه انتخاب شد';
			  </script>

</body>
</html>