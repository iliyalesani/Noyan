<?php 
session_start();
  if ($_SESSION['Logedin'] != 1)
		  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = '../login.php?msg= &pagename=manage.php&type=1';
			
            </script>
            <?php			
		  }
		  else
		  {
?>
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
			  
	if($typeback ==1)
	{  
	 //delete old logo from directory
	  $dbresult= mysql_query("select `image` from `mtblpost` where id=".$post_id,$dlink);
	  $filename_delete=mysql_fetch_assoc($dbresult);
	  unlink('../'.$filename_delete['image']);
				  mysql_query("delete from  mtblpost  WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==2)
	{  
		//delete old logo from directory
	  $dbresult= mysql_query("select `image`,`link1`,`link2`,`link3` from `mtbldownload` where id=".$post_id,$dlink);
	  $filename_delete=mysql_fetch_assoc($dbresult);
	  unlink('../'.$filename_delete['image']);
	  unlink('../'.$filename_delete['link1']);
	  unlink('../'.$filename_delete['link2']);
	  unlink('../'.$filename_delete['link3']);			
	  mysql_query("delete from  mtbldownload  WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==10)
	{  
	 //delete old logo from directory
	  $dbresult= mysql_query("select `image`,movie from `mtblmovie` where id=".$post_id,$dlink);
	  $filename_delete=mysql_fetch_assoc($dbresult);
	  unlink('../'.$filename_delete['image']);
	  unlink('../'.$filename_delete['movie']);
				  mysql_query("delete from  `mtblmovie`  WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==11)
	{  
	 //delete old logo from directory
	  $dbresult= mysql_query("select `image`,audio from `mtblaudio` where id=".$post_id,$dlink);
	  $filename_delete=mysql_fetch_assoc($dbresult);
	  unlink('../'.$filename_delete['image']);
	  unlink('../'.$filename_delete['audio']);
				  mysql_query("delete from  `mtblaudio`  WHERE  id =".$post_id,$dlink);
	}
    else if($typeback ==3)
	{  
      mysql_query("delete from  mtblsubmenu WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==6)
	{  
     	//delete old logo from directory
			$dbresult= mysql_query("select `image` from `mtblslider` where id=".$post_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['image']);
						mysql_query("delete from  mtblslider WHERE  id =".$post_id,$dlink);
	}
    else if($typeback ==9)
	{  
	//delete old logo from directory
			$dbresult= mysql_query("select `image` from `mtbladvertise` where id=".$post_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['image']);
						mysql_query("delete from  mtbladvertise WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==4)
	{  
			mysql_query("delete from  mtbluser WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==8)
	{  
		mysql_query("delete from  mtblemaildl WHERE  id =".$post_id,$dlink);
	}
	else if($typeback ==20)
	{  
	//delete message from inbox
		mysql_query("delete from  mtblmessage WHERE  id =".$post_id,$dlink);
		echo '  <script type="text/javascript" >
  window.location="adminmessages.php?type=1&msg=پیام مورد نظر حذف شد";
  </script>';
	}
	else if($typeback ==21)
	{  
	//delete message from senbox
		mysql_query("delete from  mtblmessage WHERE  id =".$post_id,$dlink);
		echo '  <script type="text/javascript" >
  window.location="adminmessages.php?type=2&msg=پیام مورد نظر حذف شد";
  </script>';
	}
	
	
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
  window.location='manage.php?type=<?php echo($typeback);  ?>&msg=رکورد مورد نظر حذف شد';
  </script>
</body>
</html>
<?php } ?>