<?php 
session_start();
  if ($_SESSION['Logedin'] != 1)
		  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = '../login.php?msg= &pagename=manage.php&type=1';
			
            </script>
            <?php			
		  }
include('includes/header.php');
include('includes/bankselect.php');


	if ( isset( $_GET["type"] ))
	$pagetype=$_GET["type"];
	else
	$pagetype=0;
	if ( isset( $_GET["dir"] ))
	$dirname=$_GET["dir"];
	else
	$dirname = "../uploadcenter";
	


function normalizePath($path)
{
    $parts = array();// Array to build a new path from the good parts
    $path = str_replace('\\', '/', $path);// Replace backslashes with forwardslashes
    $path = preg_replace('/\/+/', '/', $path);// Combine multiple slashes into a single slash
    $segments = explode('/', $path);// Collect path segments
    $test = '';// Initialize testing variable
    foreach($segments as $segment)
    {
        if($segment != '.')
        {
            $test = array_pop($parts);
            if(is_null($test))
                $parts[] = $segment;
            else if($segment == '..')
            {
                if($test == '..')
                    $parts[] = $test;

                if($test == '..' || $test == '')
                    $parts[] = $segment;
            }
            else
            {
                $parts[] = $test;
                $parts[] = $segment;
            }
        }
    }
    return implode('/', $parts);
}
$dirname=normalizePath($dirname);
?>



<div id="templatemo_content"  >
 <!--**********************************************main***************************************-->
<div id="main_column" >
<div class="mgbox"><?php if (isset($_GET['msg'])) echo $_GET['msg'];else echo'آپلود سنتر';  ?></div>
<div class="hovergallery">
<a style="background-color:#090; width:180px;font-size:12px;font-weight:bold" href="uploadcenter.php?type=1&dir=<?php echo $dirname ;?>">آپلود فایل در مسیر فعلی</a>
<a style="background-color:#069; width:180px;font-size:12px;font-weight:bold" href="uploadcenter.php?type=2&dir=<?php echo $dirname ;?>">ایجاد پوشه در مسیر فعلی</a>
<a href="uploadcenter.php?type=0" class="" style="background:none;border:none;float:left;width:auto;height:auto"><img src="../images/home.png" /></a>
</div>
<br /><br /><br />
<div class="mgbox" style="color:#900;font-size:14px;text-align:left;"><?php echo $dirname;  ?></div>
<?php 
if($pagetype==0)
{?>
<div class="uploadside">
<ul>
<?php
$dh = opendir( $dirname );
gettype( $file = readdir( $dh ));
if($dirname=="../uploadcenter")
gettype( $file = readdir( $dh ));
while ( gettype( $file = readdir( $dh ))!='boolean')
{
	if ( is_dir( "$dirname/$file" ) )
	{
		if($file!='..')
		{
		   echo '<li><a href="uploadcenter.php?type=0&dir='.$dirname.'/'.$file.'">'.$file.'</a> <a href="m_delete_file.php?type=2&
		   dir='.realpath("$dirname/$file").'&dirback='.$dirname.'" onclick="return confirm_delete2();"    style="background:none;font-size:10px;color:red;" title="حذف">×</a></li>';
		}
		else
		{
					   echo '<li><a href="uploadcenter.php?type=0&dir='.$dirname.'/'.$file.'">'.$file.'</a> </li>';
		}
	}
}

closedir( $dh );
?>
</ul>

</div>
<div class="uploadmain">
<ul>
<?php
	$dbresult = mysql_query ("SELECT * FROM sbtblstores",$dlink);
		$Store = mysql_fetch_assoc($dbresult);

$dh = opendir( $dirname );
gettype( $file = readdir( $dh ));
gettype( $file = readdir( $dh ));
while ( gettype( $file = readdir( $dh ))!='boolean')
{
	if ( is_file( "$dirname/$file" ) )
     echo '<li>'.$Store['WebAddress'].'/'.$dirname.'/'.$file.' &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<a href="m_delete_file.php?type=1&
	 dir='.realpath("$dirname/$file").'&dirback='.$dirname.'" onclick="return confirm_delete2();">حذف</a> </li>';
}

closedir( $dh );
?>
</ul>

</div>
       <?php 
}
else if ($pagetype==1)
{
	if(isset($_POST['submitfile']))
	{
	  if(isset($_FILES['file1']))
	  {
		  $uploadedfile=$_FILES['file1']['name'];
		 $filepath=$dirname.'/';
		 $filename=$_FILES['file1']['name'];
		  $i=1;
		  while(file_exists($filepath.$i.$filename))
		  {		
			  $i++;
		  }
		  $filename=$i.$filename;
		 move_uploaded_file($_FILES['file1']['tmp_name'], $filepath.$filename);
	  }
	  if(isset($_FILES['file2']))
	  {
		  $uploadedfile=$_FILES['file2']['name'];
		 $filepath=$dirname.'/';
		 $filename=$_FILES['file2']['name'];
		  $i=1;
		  while(file_exists($filepath.$i.$filename))
		  {		
			  $i++;
		  }
		  $filename=$i.$filename;
		 move_uploaded_file($_FILES['file2']['tmp_name'], $filepath.$filename);
	  }
	  if(isset($_FILES['file3']))
	  {
		  $uploadedfile=$_FILES['file3']['name'];
		 $filepath=$dirname.'/';
		 $filename=$_FILES['file3']['name'];
		  $i=1;
		  while(file_exists($filepath.$i.$filename))
		  {		
			  $i++;
		  }
		  $filename=$i.$filename;
		 move_uploaded_file($_FILES['file3']['tmp_name'], $filepath.$filename);
	  }
	  if(isset($_FILES['file4']))
	  {
		  $uploadedfile=$_FILES['file4']['name'];
		 $filepath=$dirname.'/';
		 $filename=$_FILES['file4']['name'];
		  $i=1;
		  while(file_exists($filepath.$i.$filename))
		  {		
			  $i++;
		  }
		  $filename=$i.$filename;
		 move_uploaded_file($_FILES['file4']['tmp_name'], $filepath.$filename);
	  }
	  if(isset($_FILES['file5']))
	  {
		  $uploadedfile=$_FILES['file5']['name'];
		 $filepath=$dirname.'/';
		 $filename=$_FILES['file5']['name'];
		  $i=1;
		  while(file_exists($filepath.$i.$filename))
		  {		
			  $i++;
		  }
		  $filename=$i.$filename;
		 move_uploaded_file($_FILES['file5']['tmp_name'], $filepath.$filename);
	  }
	}
	
	?>
 <br /><br />
<form action="" method="post" style="font-size:16px; line-height:22px;"  enctype="multipart/form-data">
<table  border="1" bordercolor="#333333"  width="600">
  <tr>
    <td>فایل اول:
    </td>    
    <td>              <input type="hidden" name="MAX_FILE_SIZE" value="100000000"  />
<input name="file1" type="file"  id="file1"/><br />
    </td>
  </tr>
    <tr>
    <td>فایل دوم:
    </td>    
    <td>           <input type="hidden" name="MAX_FILE_SIZE" value="10000000"  />
<input name="file2" type="file"  id="file2"/><br />
    </td>
  </tr>
    <tr>
    <td>فایل سوم:    </td>    
    <td>            <input type="hidden" name="MAX_FILE_SIZE" value="10000000"  />
<input name="file3" type="file"  id="file3"/><br />
    </td>
  </tr>
    <tr>
    <td>فایل چهارم:
    </td>    
    <td>      <input type="hidden" name="MAX_FILE_SIZE" value="10000000"  />
<input name="file4" type="file"  id="file4"/><br />
    </td>
  </tr>
    <tr>
    <td>فایل پنجم:
    </td>    
    <td>         <input type="hidden" name="MAX_FILE_SIZE" value="10000000"  />
<input name="file5" type="file"  id="file5"/><br />
    </td>
  </tr>
</table>

 
 
       

<input type="submit" name="submitfile" value="آپلود" style="font-size:17px; line-height:25px;width:50px;margin:10px;" />
 </form>
	
<?php	
}
else if ($pagetype==2)
{
	if(isset($_POST['submitdir']))
	{
	  mkdir($dirname.'/'.$_POST['dirname']);
	}
	
	?>
 <br /><br />
<form action="" method="post" style="font-size:16px; line-height:22px;"  enctype="multipart/form-data">
             نام پوشه: <input type="text" name="dirname" value="" /><br />
<input type="submit" name="submitdir" value="ایجاد" style="font-size:17px; line-height:25px;width:50px;margin:10px;" />
 </form>
<?php
}
	?>
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>