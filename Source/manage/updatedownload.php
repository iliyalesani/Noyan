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

$setfile0=' ';$setfile1=' ';$setfile2=' ';$setfile3=' ';
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
		$setfile0="`Image`= 'images/post/".$filename."' ,";		
		
		//delete old logo from directory
			$dbresult= mysql_query("select `image` from `mtbldownload` where id=".$product_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['image']);
 }
 //================================================================
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
		$setfile0="`link1` = 'filedownloads/".$filename."' ,";		
		
		//delete old file from directory
			$dbresult= mysql_query("select `link1` from `mtbldownload` where id=".$product_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['link1']);
 }
 //================================================================
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
		$setfile0="`link2` = 'filedownloads/".$filename."' ,";		
		
		//delete old file from directory
			$dbresult= mysql_query("select `link2` from `mtbldownload` where id=".$product_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['link2']);
 }
  //================================================================
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
		$setfile0="`link3` = 'filedownloads/".$filename."' ,";		
		
		//delete old file from directory
			$dbresult= mysql_query("select `link3` from `mtbldownload` where id=".$product_id,$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['link3']);
 }
	                
						$sql="update  `mtbldownload` set 
`titr` ='".$_POST['titr']."',
`shorttext` = '".$_POST['area1']."' ,
`keywords` = '".$_POST['keywords']."' ,
`description` = '".$_POST['description']."' ,
`longtext`  = '".$_POST['area2']."',".$setfile0."
`type` = '".$_POST['type']."' ,
`subjectid` =  '".$_POST['subject']."',
`writedate` = '".$shamsidate."',
`writetime` = '".jdate('H:i:s')."',".$setfile1."
`linktitle1` = '".$_POST['td1']."' ,
`linkpass1` = '".$_POST['tr1']."' ,".$setfile2."
`linktitle2` = '".$_POST['td2']."' ,
`linkpass2` = '".$_POST['tr2']."'  ,".$setfile3."
`linktitle3` = '".$_POST['td3']."'  ,
`linkpass3` = '".$_POST['tr3']."'  ,
`published`='".$_POST['published']."' ,
`price`=".$_POST['price']."
 where id=".$product_id;

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