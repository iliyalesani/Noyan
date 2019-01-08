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
		$dbResult = mysql_query("SELECT * FROM mtbladvertise WHERE  ID = ".$product_id,$dlink);
		$sub = mysql_fetch_assoc($dbResult);

	?>

    <script language="javascript">


    function confirm_send() {
		
		var result='';
	  if(document.getElementById('titr').value =="")
		{
			 result+='عنوانی برای تبلیغ نوشته نشده است \n';
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
<div id="templatemo_content"  >
<div id="main_column" >
<div class="mgbox">ویرایش تبلیغ</div>
 <!--**********************************************main***************************************-->  
 


<div id="sample">

<form action="updateadvertise.php" method="post" style="font-size:16px; line-height:22px;"  enctype="multipart/form-data">
<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
<br />

<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>تیتر:</td>
    <td><input type="text"  name="titr" id="titr"   value="<?php echo $sub['titr'] ?>"   class="formstyle2" style="width:400px;" /></td>
  </tr>
    <tr>
    <td>لینک:</td>
    <td><input type="text"  name="link"    value="<?php echo $sub['link'] ?>"  class="formstyle2" style="width:400px;" /></td>
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
    <td>وضعیت:</td>
    <td><select name="type"   class="formstyle1" >
<option  <?php if ($sub['enabled']==1)echo 'selected="selected"';?>  value="1">فعال</option>
<option <?php if ($sub['enabled']==0)echo 'selected="selected"';?>  value="0">غیر فعال</option>
</select></td>
  </tr>
        <tr>
    <td></td>
    <td>     <input type="submit" value="ارسال" id="submit" name="submit" onclick="return confirm_send();"   class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();"  class="formstyleb2"  /></td>
  </tr>
</table>
 

</form>


</div>
 
 
         

 <!--**********************************************main***************************************-->               
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->
<?php include('includes/footer.php');?>