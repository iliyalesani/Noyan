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


	$uploadedfile2=$_FILES['movie']['name'];
$filepath2='../movies/';
$filename2=$_FILES['movie']['name'];
		$i=1;
	while(file_exists($filepath2.$i.$filename2))
	{		
		$i++;
	}
	$filename2=$i.$filename2;
move_uploaded_file($_FILES['movie']['tmp_name'], $filepath2.$filename2);

	                include('includes/bankselect.php');
						$sql="INSERT INTO  `mtblmovie` (
`id` ,
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
`published`,
`movie`
)
VALUES (
NULL ,  '".$_POST['titr']."',  '".$_POST['area1']."','".$_POST['keywords']."','".$_POST['description']."',  '".$_POST['area2']."',  '"."images/post/".$filename."',  '".$_POST['type']."',  '".$_POST['subject']."',  '1',  '".$shamsidate."',  '".jdate('H:i:s')."',  '0',  '0',  '0',  '".$_POST['published']."',  '"."movies/".$filename2."');";

						 mysql_query($sql,$dlink);
						 ?>
<script type="text/javascript" >
  window.location='manage.php?type=10&msg=ویدیوی مورد نظر با موفقیت ثبت شد';
  </script>		 
  <?php
}
else
{
							 ?>
	<script type="text/javascript" >
  window.location='manage.php?type=10&msg=خطا';
  </script>		 
  <?php

}
?>
</body>
</html>