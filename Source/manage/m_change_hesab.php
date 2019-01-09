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
		$dbResult = mysql_query("SELECT * FROM mtbluser WHERE  ID = ".$product_id,$dlink);
		$sub = mysql_fetch_assoc($dbResult);

	?>

    <script language="javascript">


    function confirm_send() {
		
		var result='';
	  if(document.getElementById('price').value =="")
		{
			 result+='مبلغی وارد نشده است \n';
		}
		
		if(result=='')	
          return confirm("‌‌آیا  مطمئن هستید؟");
		else
		{
			alert (result);
			return false;
			}
    }
	
	 function change_hesab() {
	  if( document.getElementById('type').selectedIndex==0)
	  {
	    document.getElementById('titr').value = 'شارژ حساب انجام شد';
        document.getElementById('message').value = 'کاربر گرامی ، مبلغ '+document.getElementById('price').value+'  ریال به حساب شما در سایت اضافه گردید';
	  }
	  else if ( document.getElementById('type').selectedIndex==1)
	   {
	    document.getElementById('titr').value = 'برداشت از حساب انجام شد';
 document.getElementById('message').value = ' کاربر گرامی ، مبلغ '+document.getElementById('price').value+'  ریال از اعتبار شما در سایت کسر گردید و به حساب  بانکی شما واریز شد';
	   }

    }
	
	
 function change_msg() {
	  if( document.getElementById('msg').checked)
	  {
	   document.getElementById('titr').disabled = false;
	   document.getElementById('message').disabled = false;
	  }
	  else
	  {
		   document.getElementById('titr').disabled = true;
	   document.getElementById('message').disabled = true;
		  
		  }
    }
	
	
 function confirm_delete() {
       if(  confirm("‌‌لغو عملیات \n آیا  مطمئن هستید؟"))
	   window.location='manage.php?type=0&msg=عملیات مورد نظر لغو شد';
    }
	</script>
<div id="templatemo_content"  >
<div id="main_column" >
<div class="mgbox">
ویرایش حساب کاربر
</div>
<br />

 <!--**********************************************main***************************************-->      
 

<?php 
echo 'نام : '.$sub['name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
echo 'نام کاربری : '.$sub['username'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
echo 'موجودی حساب : <span style=" font-weight:bold; font-size:15px; color:green;">'.$sub['price'].'</span>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo 'کد بازاریابی : '.$sub['ad_code'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 


		$dbResultm = mysql_query("SELECT id,username,name FROM mtbluser WHERE  ad_code ='".$sub['moaref']."' and ad_code <>''",$dlink);
		$subm = mysql_fetch_assoc($dbResultm);
if($subm['username']!="")
  echo ' معرف : <a href="m_change_hesab.php?type_back=4&id='.$subm['id'].'" style=" font-weight:bold; font-size:15px; color:green;">'.$subm['username'].'</a>'.' ('.$subm['name'].')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
else
  echo ' معرف : ندارد'; 
  echo '<hr/>';
  
  echo 'شماره حساب : '.$sub['sh_hesab'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
  echo 'تلفن : '.$sub['tel']; 
    echo '<hr/>';
	 echo 'آدرس : '.$sub['address']; 
echo '<hr style="background-color:#F90;height:5px;"/>';
?>
<div id="sample">
<form action="update_hesab.php" method="post" style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;padding:15px; line-height:30px; direction:rtl" >

<input type="hidden" name="type_back" value="<?php echo $type_back; ?>"/>
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
<table width="500" border="0" >

  <tr>
    <td>نوع عملیات : </td>
    <td>
    <select name="type" id="type" class="formstyle1" onchange="change_hesab();" >
<option  selected="selected"  value="1">اضافه به حساب</option>
<option   value="2">کم کردن از حساب</option>
</select>
</td>
  </tr>
  <tr>
   <td  style="height:80px;">مبلغ مورد نظر : </td>
    <td>
    <input type="text"      name="price" id="price" class="formstyle1"  onchange="change_hesab();"   />
    </td>
    </tr>
</table>
<hr style="background-color:#F90;height:5px;"/>


<table width="500" border="0" >
  <tr>
  </tr>
  <tr>
    <td> ارسال پیام: </td>
    <td>
<input type="checkbox" name="msg" id="msg" onchange="change_msg();"  title="آیا پیغامی هم برای این کاربر ارسال شود؟" />
</td>
  </tr>
  <tr>
   <td >عنوان : </td>
    <td>
    <input type="text"  name="titr" id="titr" disabled="disabled" class="formstyle1"  style="width:250px;"   value="شارژ حساب انجام شد"  />
    </td>
    </tr>
      <tr>
   <td >متن پیام : </td>
    <td>
   <textarea name="message"  id="message"  disabled="disabled" cols="60" rows="10">کاربر گرامی ، مبلغ  به حساب شما در سایت اضافه گردید</textarea>
    </td>
    </tr>
</table>






<hr style="background-color:#F90;height:5px;"/> <input type="submit" value="ثبت" id="submit" name="submit" onClick="return confirm_send();" class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();" class="formstyleb2" />

</form>
       


</div></div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>