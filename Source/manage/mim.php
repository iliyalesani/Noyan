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

<div id="templatemo_content"  >
<div id="main_column" >
<div class="mgbox">درج دسته</div>
 <!--**********************************************main***************************************-->      
 
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

<div id="sample">
<form action="save_submenu.php" method="post" style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;padding:15px; line-height:30px; direction:rtl" >
<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>

<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>عنوان دسته:</td>
    <td><input type="text"  name="titr"  id="titr" class="formstyle2"     /></td>
  </tr>
  <tr>
      <tr>
    <td>متاتگ کلمات کلیدی:</td>
    <td><textarea name="keywords"  class="formstyle2"  style="width: 50%; height:100px;" ></textarea></td>
  </tr>
    <tr>
    <td>متاتگ توضیحات:</td>
    <td><textarea name="description"  class="formstyle2"  style="width: 50%; height:100px;" ></textarea></td>
  </tr>
        <tr>
    <td>سر دسته:</td>
    <td><select name="parent_subject"  class="formstyle1" >
    <option value="0">بدون سر دسته</option>
<?php
                        include('includes/bankselect.php');
				       $dbresult = mysql_query("select * from mtblsubmenu  where parentid=3 and parent=0",$dlink);
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					echo('<option value="'.$post['id'].'">'.$post['title'].'</option>');					
				}
?>
</select></td>
  </tr>
    <td>مجموعه :</td>
    <td><select name="group" class="formstyle1" >
<option value="3">کالا ها</option>
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