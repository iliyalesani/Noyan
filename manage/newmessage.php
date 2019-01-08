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

if(isset($_GET["reciver"])  && is_numeric($_GET['reciver']))
{
$reciver=$_GET["reciver"];	

}
else
{
$reciver=-1; // no selected user at first
}
	
?>


    <script language="javascript">


    function confirm_send() {
		
		var result='';
	  if(document.getElementById('reciver').value =="")
		{
			 result+='گیرنده ی پیام انتخاب نشده است \n';
		}
		if(document.getElementById('titr').value =="")
		{
			 result+='عنوان پیام وارد نشده است \n';
		}

		
		if(result=='')	
          return confirm("‌‌آیا  مطمئن هستید؟");
		else
		{
			alert (result);
			return false;
			}
    }
	
 function change_msg() {
	  if( document.getElementById('msg').checked)
	  {
	   document.getElementById('reciver').disabled =true ;
	  }
	  else
	  {
	 document.getElementById('reciver').disabled = false; 
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
ارسال پیام جدید
</div>
<br />

 <!--**********************************************main***************************************-->      
 





<form action="savemessage.php" method="post" style="font-size:16px;font-family:Tahoma, Geneva, sans-serif;padding:15px; line-height:30px; direction:rtl" >
<table width="100%" bordercolor="#cccccc"  border="1" rules="rows" cellpadding="5" >
  <tr>
    <td>گیرنده:</td>
    <td><select name="reciver" id="reciver"  class="formstyle1" ><?php
                 
			 $dbResult = mysql_query("SELECT id,username FROM mtbluser where confirm=1 and enabled=1 ",$dlink);
				while($post = mysql_fetch_assoc ($dbResult) )
				{
					$selected='';
					if($post['id']==$reciver)
					$selected='selected="selected"';
					else
					$selected='';
					echo('<option  '.$selected.' value="'.$post['id'].'">'.$post['username'].'</option>');					
				}
?>
</select>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="checkbox" name="msg" id="msg" onchange="change_msg();"  title="آیا مایلید پیغام برای همه ی کاربران ارسال شود؟" /> ارسال برای همه  </td>
  </tr>
  
    <tr>
    <td>عنوان:</td>
    <td><input type="text"  name="titr" id="titr" class="formstyle1"   /></td>
  </tr>
      <tr>
    <td>متن پیام:</td>
    <td><textarea class="ckeditor" name="message"  id="message"  cols="100" rows="25"></textarea></td>
  </tr>
  
        <tr>
    <td></td>
    <td><input type="submit" value="ارسال" id="submit" name="submit" onClick="return confirm_send();" class="formstyleb1" />
	  <input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();" class="formstyleb2" /></td>
  </tr>
</table>
</form>
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>