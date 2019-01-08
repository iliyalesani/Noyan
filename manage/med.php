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
		$dbResult = mysql_query("SELECT * FROM mtbldownload WHERE  ID = ".$product_id,$dlink);
		$sub = mysql_fetch_assoc($dbResult);

	?>



<div id="templatemo_content"  >
<div id="main_column" >
<div class="mgbox">ویرایش دانلود</div>
 <!--**********************************************main***************************************-->      
 

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
<form action="updatedownload.php" method="post" style="font-size:16px; line-height:22px;"  enctype="multipart/form-data">
<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
<br />
<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>تیتر:</td>
    <td><input type="text"  name="titr" id="titr"  value="<?php echo $sub['titr'] ?>" class="formstyle2" style="width:400px;" /></td>
  </tr>
  <tr>
    <td>خلاصه مطلب:</td>
    <td><textarea name="area1"  class="formstyle2"  style="width: 80%; height:100px;	background: #f4f6f9; ;" ><?php echo $sub['shorttext'] ?></textarea></td>
  </tr>
    <tr>
    <td>متاتگ کلمات کلیدی:</td>
    <td><textarea name="keywords"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['keywords'] ?></textarea></td>
  </tr>
    <tr>
    <td>متاتگ توضیحات:</td>
    <td><textarea name="description"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['description'] ?></textarea></td>
  </tr>
  
    <tr>
    <td>متن اصلی:</td>
    <td><textarea name="area2"  class="ckeditor"  style="width: 80%; height:500px; background-color:#FFF; background-image:none; font-size:14px;" ><?php echo $sub['longtext'] ?></textarea></td>
  </tr>
      <tr>
    <td>عکس قبلی:</td>
    <td><?php echo ' <img src="../'.$sub['image'].'"  />'; ?></td>
  </tr>
    <tr>
    <td>عکس جدید:</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000"  />
<input name="fl" type="file"  id="fl"/></td>
  </tr>
    <tr>
    <td>نوع مخاطب:</td>
    <td><select name="type"   class="formstyle1" >
<option  <?php if ($sub['type']==1)echo 'selected="selected"';?> value="1">عمومی</option>
<option <?php if ($sub['type']==2)echo 'selected="selected"';?> value="2">اعضاء</option>
<option  <?php if ($sub['type']==3)echo 'selected="selected"';?> value="3">اعضاء الماسی</option>
<option <?php if ($sub['type']==4)echo 'selected="selected"';?> value="4">محصولات</option>
</select></td>
  </tr>

      <tr>
    <td>موضوع مطلب:</td>
    <td><select name="subject"  class="formstyle1" >
<?php
                 
			   $dbresult = mysql_query("select * from mtblsubmenu  where parentid=3",$dlink);
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$selected='';
					if($post['id']==$sub['subjectid'])
					$selected='selected="selected"';
					else
					$selected='';
					echo('<option  '.$selected.' value="'.$post['id'].'">'.$post['title'].'</option>');					
				}
?>
</select></td>
  </tr>
        <tr>
    <td>مبلغ:</td>
    <td><input type="text"  name="price"  id="price" value="<?php echo $sub['price'] ?>" class="formstyle2" value="0" style="width:400px;" /></td>
  </tr>
        <tr>
    <td>دانلود اول:</td>
   
    <td > فایل:&nbsp;<input type="hidden" name="MAX_FILE_SIZE" value="90000000"  /><input name="fd1" type="file"  id="fd1"/>&nbsp;&nbsp;&nbsp;
  تیتر:&nbsp;<input type="text"  name="td1" value="<?php echo $sub['linktitle1'] ?>" class="formstyle2"  style="width:180px;" />&nbsp;&nbsp;&nbsp;
    رمز:&nbsp;<input type="text"  name="tr1" value="<?php echo $sub['linkpass1'] ?>" class="formstyle2"  style="width:180px;" />
   
    </td>
  </tr>
        <tr>
    <td>دانلود دوم:</td>
   
    <td > فایل:&nbsp;<input type="hidden" name="MAX_FILE_SIZE" value="90000000"  /><input name="fd2" type="file"  id="fd2"/>&nbsp;&nbsp;&nbsp;
  تیتر:&nbsp;<input type="text"  name="td2" value="<?php echo $sub['linktitle2'] ?>" class="formstyle2"  style="width:180px;" />&nbsp;&nbsp;&nbsp;
    رمز:&nbsp;<input type="text"  name="tr2" value="<?php echo $sub['linkpass2'] ?>" class="formstyle2"  style="width:180px;" />
   
    </td>
  </tr>
          <tr>
    <td>دانلود سوم:</td>
   
    <td > فایل:&nbsp;<input type="hidden" name="MAX_FILE_SIZE" value="90000000"  /><input name="fd3" type="file"  id="fd3"/>&nbsp;&nbsp;&nbsp;
  تیتر:&nbsp;<input type="text"  name="td3" value="<?php echo $sub['linktitle3'] ?>" class="formstyle2"  style="width:180px;" />&nbsp;&nbsp;&nbsp;
    رمز:&nbsp;<input type="text"  name="tr3" value="<?php echo $sub['linktitle3'] ?>" class="formstyle2"  style="width:180px;" />
   
    </td>
  </tr>

        <tr>
    <td>وضعیت نمایش:</td>
    <td><select name="published"   class="formstyle1" >
<option  <?php if ($sub['published']==1)echo 'selected="selected"';?> value="1">انتشار</option>
<option <?php if ($sub['published']==0)echo 'selected="selected"';?> value="0">عدم انتشار</option>
</select></td>
  </tr>
          <tr>
    <td></td>
    <td>      <input type="submit" value="ارسال" id="submit" name="submit" onclick="return confirm_send();"  class="formstyleb1"  />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();"   class="formstyleb2" /></td>
  </tr>
      
</table>



</form>

 
 
         

 <!--**********************************************main***************************************-->               
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>