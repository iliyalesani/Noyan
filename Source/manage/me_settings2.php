<?php 
session_start();
  if ($_SESSION['Logedin'] != 1)
		  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = '../login.php?msg= &pagename=manage.php&type=1';
			
            </script>
            <?php			
		  }
include('includes/header.php');?>
<?php
   include('includes/bankselect.php');


if(is_numeric($_GET["type_back"])  )
{
$type_back=$_GET["type_back"];

}
else
{
	echo('
	<script type="text/javascript" >
window.location="../erorr404.php";
</script>');

	}
	

?>
 <?php
		$dbResult = mysql_query("SELECT * FROM sbtblstores",$dlink);
		$sub = mysql_fetch_assoc($dbResult);

	?>
  <script src="../js/jquery-1.5.js"></script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 100) {
          val.value = val.value.substring(0, 100);
        } else {
          $('#charNum').text(100 - len);
        }
      };
    </script>
    
    
    <script language="javascript">


    function confirm_send() {
		
		var result='';

		
		if(result=='')	
          return confirm("‌‌آیا  مطمئن هستید؟");
		else
		{
			alert (result);
			return false;
			}
    }

    function confirm_delete() {
       if(  confirm("‌‌لغو عملیات \n آیا  مطمئن هستید؟"))
	   window.location='manage.php?type=0&msg=عملیات مورد نظر لغو شد';
    }


	
</script>

<div id="templatemo_content"  >
<div id="main_column" >
<div class="mgbox">تنظیمات صفحات ویژه</div>
<div class="hovergallery">
<a style="background-color:#900; width:170px;font-size:13px;font-weight:bold" href="me_settings.php?type_back=5">تنظیمات اصلی</a>
<a style="background-color:#900; width:170px;font-size:13px;font-weight:bold" href="me_settings2.php?type_back=5">تنظیمات صفحات ویژه</a>
</div><br />
<br />
 <!--**********************************************main***************************************-->  
 

<form action="update_setting2.php" method="post" name="formstore"  enctype="multipart/form-data"  >
<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<br/><table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>متن صفحه درباره ما:</td>
    <td><textarea class="ckeditor"   name="aboutus" id="aboutus"    style="height:250px;" class="formstyle2"     ><?php echo $sub['AboutUs'] ?></textarea></td>
  </tr>
     <tr> <td colspan="2"><hr  style="height:15px;" color="#336633"/></td></tr>
    <tr>
    <td>متن صفحه تماس با ما:</td>
    <td><textarea class="ckeditor"   name="contactus" id="contactus"    style="height:250px;" class="formstyle2"     ><?php echo $sub['ContactUs'] ?></textarea></td>
  </tr>
  

        <tr>
    <td></td>
    <td> <input type="submit" value="ذخیره" id="submit" name="submit" onClick="return confirm_send();" class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();" class="formstyleb2" /></td>
  </tr>
  
  </table>


</form>

 
 
         

 <!--**********************************************main***************************************-->               
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php'); ?>