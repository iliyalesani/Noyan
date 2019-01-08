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
	  if(document.getElementById('titr').value =="")
		{
			 result+='عنوانی برای سایت نوشته نشده است \n';
		}
		if(document.getElementById('webaddress').value =="")
		{
			 result+='آدرسی برای سایت نوشته نشده است \n';
		}
	 if(document.getElementById('fl').value.length>0)
        {
		  if (!document.getElementById('fl').value.match(/\.(jpg|jpeg|png|gif)$/))
		   {
			   result+='پسوند عکس انتخاب شده نا صحیح است \n';
           }
     	}
	if(document.getElementById('managermail').value =="")
		{
			 result+='ایمیل وارد نشده است\n';
		}
	if(document.getElementById('pwd1').value =="")
		{
			 result+='رمز وارد نشده است\n';
			}
	if(document.getElementById('pwd1').value != document.getElementById('pwd2').value)
		{
			  result+='رمز و  تکرار آن با هم مطابقت ندارند  \n';
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
<div class="mgbox">تنظیمات اصلی</div>
<div class="hovergallery">
<a style="background-color:#900; width:170px;font-size:13px;font-weight:bold" href="me_settings.php?type_back=5">تنظیمات اصلی</a>
<a style="background-color:#900; width:170px;font-size:13px;font-weight:bold" href="me_settings2.php?type_back=5">تنظیمات صفحات ویژه</a>
</div><br />
<br />

 <!--**********************************************main***************************************-->  




<form action="update_setting.php" method="post" name="formstore"  enctype="multipart/form-data"   >

<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<br/><table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>عنوان سایت:</td>
    <td><input type="text"  name="titr" id="titr" value="<?php echo $sub['Title'] ?>" class="formstyle2"     /></td>
  </tr>
    <tr>
    <td>‌آدرس سایت:</td>
    <td><input type="text"  name="webaddress" id="webaddress" value="<?php echo $sub['WebAddress'] ?>"  placeholder="www.example.com" class="formstyle2"     /></td>
  </tr>
    <tr>
    <td>لوگوی سایت:</td>
    <td><?php echo ' <img  src="../'.$sub['Logo'].'"  />'; ?> <br/><input type="hidden" name="MAX_FILE_SIZE" value="90000000"  />
<input name="fl" type="file"  id="fl" style="background-color:#fff;width:500px;height:25px; font-size:15px;"  /></td>
  </tr>
      <tr>
    <td>شرح کار سایت:</td>
    <td><div id="charNum" style="color:#F00">  </div><div  style="color:#F00"> کاراکتر باقیمانده </div> 
<textarea   name="status"   onkeyup="countChar(this)"  style="height:100px;" class="formstyle2"     ><?php echo $sub['Status'] ?></textarea></td>
  </tr>
 <tr> <td colspan="2"><hr  style="height:15px;" color="#336633"/></td></tr>
      <tr>
    <td>‌نام مدیر:</td>
    <td><input type="text"  name="managername"   value="<?php echo $sub['ManagerName'] ?>" class="formstyle2"     /></td>
  </tr>
      <tr>
    <td>ایمیل مدیر:</td>
    <td><input type="text"  name="managermail" id="managermail"  value="<?php echo $sub['ManagerMail'] ?>" class="formstyle2"     /></td>
  </tr>
        <tr>
    <td>تلفن:</td>
    <td><input type="text"  name="tel" id="tel" value="<?php echo $sub['Tel'] ?>" class="formstyle2"     /></td>
  </tr>
        <tr>
    <td>موبایل:</td>
    <td><input type="text"  name="mobile1" id="mobile1"  value="<?php echo $sub['Mobile1'] ?>" class="formstyle2"     /></td>
  </tr>
        <tr>
    <td>آدرس:</td>
    <td><input type="text"  name="address"  value="<?php echo $sub['Address'] ?>" class="formstyle2"     /></td>
  </tr>
   <tr> <td colspan="2"><hr  style="height:15px;" color="#336633"/></td></tr>
      <tr>
    <td>متاتگ کلمات کلیدی:</td>
    <td><textarea name="keywords"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['Tags'] ?></textarea></td>
  </tr>
        <tr>
    <td>متاتگ توضیحات:</td>
    <td><textarea name="description"  class="formstyle2"  style="width: 50%; height:100px;" ><?php echo $sub['description'] ?></textarea></td>
  </tr>
   <tr> <td colspan="2"><hr  style="height:15px;" color="#336633"/></td></tr>
        <tr>
    <td>آمار بازدید:</td>
    <td><select name="visit"   class="formstyle1" >
<option  <?php if ($sub['VisitEnabled']==1)echo 'selected="selected"';?>  value="1"> نمایش آمار</option>
<option <?php if ($sub['VisitEnabled']==0)echo 'selected="selected"';?>  value="0">عدم نمایش آمار</option>
</select></td>
  </tr>
  
          <tr>
    <td>رمز عبور:</td>
    <td><input type="password" name="pwd1"   id="pwd1"  value="<?php echo $sub['Password'] ?>" class="formstyle1"     /></td>
  </tr>
          <tr>
    <td>تکرار رمز:</td>
    <td><input type="password"  name="pwd2"  id="pwd2"  value="<?php echo $sub['Password'] ?>" class="formstyle1"     /></td>
  </tr>
   <tr> <td colspan="2"><hr  style="height:15px;" color="#336633"/></td></tr>
            <tr>
    <td></td>
    <td><input type="submit" value="ذخیره" id="submit" name="submit" onClick="return confirm_send();" class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();" class="formstyleb2" /></td>
  </tr>
</table>

</form>

 
 
         

 <!--**********************************************main***************************************-->               
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php'); ?>