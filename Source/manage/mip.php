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
<div class="mgbox">درج مقاله</div>


    <script language="javascript">


    function confirm_send() {
		
		var result='';
	  if(document.getElementById('titr').value =="")
		{
			 result+='عنوانی برای پست نوشته نشده است \n';
		}
	 if(document.getElementById('fl').value.length>0)
        {
		  if (!document.getElementById('fl').value.match(/\.(jpg|jpeg|png|gif)$/))
		   {
			   result+='پسوند عکس انتخاب شده نا صحیح است \n';
           }
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
<!-- /TinyMCE -->
<br />

<form action="savepost.php" method="post" style="font-size:13px; line-height:22px;"  enctype="multipart/form-data">
<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>تیتر:</td>
    <td><input type="text"  name="titr" id="titr"   class="formstyle2" style="width:400px;" /></td>
  </tr>
  <tr>
    <td>خلاصه مطلب:</td>
    <td><textarea name="area1"  class="formstyle2"  style="width: 80%; height:100px;	background: #f4f6f9; ;" ></textarea></td>
  </tr>
    <tr>
    <td>متاتگ کلمات کلیدی:</td>
    <td><textarea name="keywords"  class="formstyle2"  style="width: 50%; height:100px;" ></textarea></td>
  </tr>
    <tr>
    <td>متاتگ توضیحات:</td>
    <td><textarea name="description"  class="formstyle2"  style="width: 50%; height:100px;" ></textarea></td>
  </tr>
  
    <tr>
    <td>متن اصلی:</td>
    <td><textarea name="area2"  class="ckeditor"  style="width: 80%; height:500px; background-color:#FFF; background-image:none; font-size:14px;" ></textarea></td>
  </tr>
    <tr>
    <td>عکس پست:</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000"  />
<input name="fl" type="file"  id="fl"/></td>
  </tr>
    <tr>
    <td>نوع مخاطب:</td>
    <td><select name="type"   class="formstyle1" >
<option value="1">عمومی</option>
<option value="2">اعضاء</option>
<option value="3">اعضاء الماسی</option>
<option value="4">محصولات</option>
</select></td>
  </tr>
    <tr>
    <td>موضوع مطلب:</td>
    <td><select name="subject"   class="formstyle1" >
<?php
                    include('includes/bankselect.php');
							$dbresult = mysql_query("select * from mtblsubmenu  where parentid=2",$dlink);
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					echo('<option value="'.$post['id'].'">'.$post['title'].'</option>');					
				}
?>
</select></td>
  </tr>
      <tr>
    <td>وضعیت نمایش:</td>
    <td><select name="published"   class="formstyle1" >
<option value="1">انتشار</option>
<option value="0">عدم انتشار</option>
</select></td>
  </tr>
  
        <tr>
    <td></td>
    <td>    <input type="submit" value="ارسال" id="submit" name="submit" onclick="return confirm_send();"   class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();"  class="formstyleb2"  /></td>
  </tr>

</table>

  

</form>
            
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>