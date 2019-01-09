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
				<h1 class="contenth1">ثبت نام</h1>
				<!-- Portfolio -->

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
    <td>نام کاربری:</td>
    <td> <input type="text" name="username" id="username" required  title="نام کاربری"></td>
  </tr>
  <tr>
    <td>ایمیل:</td>
    <td> <input  style="direction:ltr" type="email" name="email" id="email"  required="required" title=" ایمیل به طور صحیح وارد شود" /></td>
  </tr>
   <tr>
    <td>رمز عبور:</td>
    <td> <input type="password" name="password" id="password" required  title="رمز عبور"></td>
  </tr>
     <tr>
    <td>تکرار رمز:</td>
    <td> <input type="password" name="password2" id="password2" required  title="تکرار رمز"></td>
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
    <td><input type="button" name="submit"  class="submit"  onClick="formget2(this.form, 'saveuser.php');" value="ثبت نــام" /></td>
  </tr>
  
</table>                                     
 </form>
								<!-- ENDS form -->

			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>