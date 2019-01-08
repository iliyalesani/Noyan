<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('includes/bankselect.php');

if(isset($_POST['titr']))
{
$type_back=$_POST["type_back"];
$setfile=' ';
  if($_FILES['fl']['size']>10)
  {
			  $uploadedfile=$_FILES['fl']['name'];
		$filepath='../images/logo/';
		$filename=$_FILES['fl']['name'];
				$i=1;
			while(file_exists($filepath.$i.$filename))
			{		
				$i++;
			}
			$filename=$i.$filename;
		move_uploaded_file($_FILES['fl']['tmp_name'], $filepath.$filename);
		$setfile="`Logo`= 'images/logo/".$filename."' , ";
		
		
		//delete old logo from directory
			$dbresult= mysql_query("select `Logo` from `sbtblstores` where  ID=1 ",$dlink);
			$filename_delete=mysql_fetch_assoc($dbresult);
			unlink('../'.$filename_delete['Logo']);
 }

	                
$sql="UPDATE  `sbtblstores` SET  
`Title` =  '".$_POST['titr']."',
`Password` = '".$_POST['pwd1']."',
`ManagerName` =  '".$_POST['managername']."',
`ManagerMail` =  '".$_POST['managermail']."',
`Tel` = '".$_POST['tel']."',
`Mobile1` = '".$_POST['mobile1']."',".
$setfile
."`Status` =  '".$_POST['status']."',
`Address` = '".$_POST['address']."',
`Tags` = '".$_POST['keywords']."',
`description` = '".$_POST['description']."',
`WebAddress` = '".$_POST['webaddress']."',
`VisitEnabled` = '".$_POST['visit']."'
 WHERE  `ID` =1";
 //echo $sql;
						 mysql_query($sql,$dlink);
						 ?>
	<script type="text/javascript" >
  window.location='manage.php?type=<?php echo $type_back ?>&msg=تنظیمات مورد نظر با موفقیت انجام شد';
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