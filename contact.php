<?php include('includes/header.php'); ?>
    
		<!-- WRAPPER -->
		<div id="wrapper">
			

		<!-- MAIN -->
		<div id="main" >
			
			<!-- content -->
			<div id="content" >
				
				<!-- title -->
				<div id="page-title">
					<span class="title"></span>
					<span class="subtitle"></span>
				</div>
				<!-- ENDS title -->
				<h1 class="contenth1">تماس با ما</h1>
				<!-- Portfolio -->
<?php     
      $dbresult = mysql_query("select ContactUs from sbtblstores",$dlink);
	  $post = mysql_fetch_assoc($dbresult);
	  echo $post['ContactUs'];
?>
<hr/>
									<h3 style="margin-right:10px">فرم تماس</h3>	
								<!-- form -->
 <div id="ajaxloader"> </div>
   <br/>                       
<form id="form1" class="sendcomment" name="form1" method="post"  >
<table  border="0" >
  <tr>
    <td>نام:</td>
    <td> <input type="text" name="name" id="name" required  title=" نام و نام خانوادگی"></td>
  </tr>
  <tr>
    <td>ایمیل:</td>
    <td> <input  style="direction:ltr" type="email" name="email" id="email"  required="required" title=" ایمیل به طور صحیح وارد شود" /></td>
  </tr>
  <tr>
    <td valign="middle">متن پیام: </td>
    <td><textarea name="comment" id="comment" required cols="60" rows="5"></textarea></td>
  </tr>
  <tr>
    <td> </td>
    <td><img src="captchaphp/calledcaptcha.php"  width="90" height="30" style="border-radius:2px;"/> </td>
  </tr>
    <tr>
        <td>کد امنیتی :</td>
        <td><input   type="text" name="capcode" id="capcode"   required="required" /></td>
    </tr>
 
<tr>
    <td> </td>
    <td><input type="button" name="submit"  class="submit"  onClick="formget(this.form, 'savecontact.php');" value="ارسال پیام" /></td>
  </tr>
  
</table>                                     
        <input type="hidden" name="postid" id="postid" value="<?php echo $_GET['id'] ?>"/>
        <input type="hidden" name="pagename" id="pagename" value="<?php echo basename($_SERVER['PHP_SELF']); ?>"/>
 </form>
								<!-- ENDS form -->

			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>