<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include_once('../jdf.php');
$shamsidate=jdate('Y/m/d');
if(isset($_POST['titr']))
{
	$file0='';$file1='';$file2='';$file3='';
  if($_FILES['fl']['size']>10)
  {
	
	$uploadedfile=$_FILES['fl']['name'];
	$filepath='../images/post/';
	$filename=$_FILES['fl']['name'];
		$i=1;
	while(file_exists($filepath.$i.$filename))
	{		
		$i++;
	}
	$filename=$i.$filename;
    move_uploaded_file($_FILES['fl']['tmp_name'], $filepath.$filename);
	$file0="images/post/".$filename;
  }
//------------------------------------------------------------------------------
  if($_FILES['fd1']['size']>10)
  {
	
  $uploadedfile=$_FILES['fd1']['name'];
	$filepath='../filedownloads/';
	$filename=$_FILES['fd1']['name'];
		$i=1;
	while(file_exists($filepath.$i.$filename))
	{		
		$i++;
	}
	$filename=$i.$filename;
    move_uploaded_file($_FILES['fd1']['tmp_name'], $filepath.$filename);
	$file1="filedownloads/".$filename;
  }
//------------------------------------------------------------------------------     
//------------------------------------------------------------------------------
 if($_FILES['fd2']['size']>10)
  {
	
  $uploadedfile=$_FILES['fd2']['name'];
	$filepath='../filedownloads/';
	$filename=$_FILES['fd2']['name'];
		$i=1;
	while(file_exists($filepath.$i.$filename))
	{		
		$i++;
	}
	$filename=$i.$filename;
    move_uploaded_file($_FILES['fd2']['tmp_name'], $filepath.$filename);
	$file2="filedownloads/".$filename;
  }
//------------------------------------------------------------------------------ 
//------------------------------------------------------------------------------
 if($_FILES['fd3']['size']>10)
  {
	
  $uploadedfile=$_FILES['fd3']['name'];
	$filepath='../filedownloads/';
	$filename=$_FILES['fd3']['name'];
		$i=1;
	while(file_exists($filepath.$i.$filename))
	{		
		$i++;
	}
	$filename=$i.$filename;
    move_uploaded_file($_FILES['fd3']['tmp_name'], $filepath.$filename);
	$file3="filedownloads/".$filename;
  }
//------------------------------------------------------------------------------                       
					  
					  
  include('includes/bankselect.php');
						$sql="INSERT INTO  `mtbldownload` (
`id` ,
`name` ,
`titr` ,
`shorttext` ,
`keywords` ,
`description` ,
`longtext` ,
`image` ,
`type` ,
`subjectid` ,
`writerid` ,
`writedate` ,
`writetime` ,
`like` ,
`view` ,
`star` ,
`link1` ,
`linktitle1` ,
`linkpass1` ,
`link2` ,
`linktitle2` ,
`linkpass2` ,
`link3` ,
`linktitle3` ,
`linkpass3` ,
`published`,
`price`
)
VALUES (
NULL ,  '',    '".$_POST['titr']."',  '".$_POST['area1']."','".$_POST['keywords']."','".$_POST['description']."',  '".$_POST['area2']."',  '".$file0."',  '".$_POST['type']."',  '".$_POST['subject']."','1',  '".$shamsidate."',  '".jdate('H:i:s')."', '0',  '0',  '0',  '".$file1."',  '".$_POST['td1']."',  '".$_POST['tr1']."',  '".$file2."',  '".$_POST['td2']."',  '".$_POST['tr2']."',  '".$file3."',  '".$_POST['td3']."',  '".$_POST['tr3']."',  '".$_POST['published']."',  ".$_POST['price']."
);";

						 mysql_query($sql,$dlink);
						 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=2&msg= پست مورد نظر با موفقیت ثبت شد ';
  </script>		 
  <?php
}
else
{
							 ?>
						<script type="text/javascript" >
  window.location='manage.php?type=2&msg=خطا';
  </script>		 
  <?php

}
?>
</body>
</html>