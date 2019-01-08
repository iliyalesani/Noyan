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


if(is_numeric($_GET["type_back"])  && is_numeric($_GET['id']))
{
$type_back=$_GET["type_back"];
$product_id=$_GET["id"];	

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
		$dbResult = mysql_query("SELECT * FROM mtblsubmenu WHERE  ID = ".$product_id,$dlink);
		$sub = mysql_fetch_assoc($dbResult);

	?>

    <script language="javascript">


    function confirm_send() {
		
		var result='';
	  if(document.getElementById('titr').value =="")
		{
			 result+='عنوانی برای موضوع نوشته نشده است \n';
		}
		
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
<div class="mgbox">ویرایش موضوع</div>
 <!--**********************************************main***************************************-->      
 


<div id="sample">
<form action="update_submenu.php" method="post" style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;padding:15px; line-height:30px; direction:rtl" >

<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>


<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>عنوان دسته:</td>
    <td><input type="text"   value="<?php echo $sub['title'] ?>"    name="titr" id="titr" class="formstyle2"     /></td>
  </tr>
  <tr>
  
       <tr>
    <td>متاتگ کلمات کلیدی:</td>
    <td><textarea name="keywords"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['keywords'] ?></textarea></td>
  </tr>
    <tr>
    <td>متاتگ توضیحات:</td>
    <td><textarea name="description"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['description'] ?></textarea></td>
  </tr>
    <td>سردسته:</td>
    <td><select name="parent_subject"  class="formstyle1" >
       <option value="0">بدون سر دسته</option>
<?php
                 
			   $dbresult = mysql_query("select * from mtblsubmenu  where parentid=3 and parent=0",$dlink);
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$selected='';
					if($post['id']==$sub['parent'])
					$selected='selected="selected"';
					else
					$selected='';
					echo('<option  '.$selected.' value="'.$post['id'].'">'.$post['title'].'</option>');					
				}
?>
</select></td>
  </tr>
    <td>مجموعه :</td>
    <td><select name="group" class="formstyle1" >
<option <?php if ($sub['parentid']==3)echo 'selected="selected"';?>  value="3">کالا ها</option>
</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="ذخیره" id="submit" name="submit" onClick="return confirm_send();" class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();" class="formstyleb2" /></td>
  </tr>
</table>

</form>
       


</div>
 
 
         

 <!--**********************************************main***************************************-->               
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>