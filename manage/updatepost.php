<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('includes/bankselect.php');
include_once('../jdf.php');
$shamsidate=jdate('Y/m/d');
if(isset($_POST['titr']))
{
$type_back=$_POST["type_back"];
$product_id=$_POST["product_id"];

$setfile=' ';
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
		$setfile="`Image`= 'images/post/".$filename."' ,";
		
		
		//delete old logo from directory
			$dbresult= mysql_query("select `image` from `mtblpost` where id=".$product_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['image']);
 }

	                
						$sql="update  `mtblpost` set 
`titr` ='".$_POST['titr']."',
`shorttext` = '".$_POST['area1']."' ,
`keywords` = '".$_POST['keywords']."' ,
`description` = '".$_POST['description']."' ,
`longtext`  = '".$_POST['area2']."',".
$setfile
."`type` = '".$_POST['type']."' ,
`subjectid` =  '".$_POST['subject']."',
`writedate` = '".$shamsidate."',
`writetime` = '".jdate('H:i:s')."',

`published`='".$_POST['published']."'   where id=".$product_id;

						 mysql_query($sql,$dlink);
						 ?>
	<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=پست مورد نظر با موفقیت ویرایش شد';
  </script>		 
  <?php
}
else
{
							 ?>
  <script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=خطا';
  </script>		 
  <?php

}
?>
</body>
</html>