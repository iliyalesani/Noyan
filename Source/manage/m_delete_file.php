<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>



<body>
<?php
$type=$_GET['type'];
$path=$_GET['dir'];
$path_back=$_GET['dirback'];				
if ($type==1)
{
	unlink($path);
	echo $path_back;
   echo ('<script type="text/javascript" >  window.location="uploadcenter.php?dir='.$path_back.'&msg=فایل مورد نظر حذف شد";  </script>');
}
else if ($type==2)
{
	rmdir($path);
  echo ('<script type="text/javascript" >  window.location="uploadcenter.php?dir='.$path_back.'&msg=پوشه مورد نظر حذف شد";  </script>');
}

   
   
   
   
  
  ?>
</body>
</html>