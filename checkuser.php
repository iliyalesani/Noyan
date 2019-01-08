<?php
session_start();

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

if(isset($_POST["username"]))
   $username=$_POST["username"];
  else
   $username="0";
   
if(isset($_POST["password"]))
   $password=$_POST["password"];
  else
   $password="0";

if($username!="0"  && $password!="0")
   {
	  include('includes/bankselect.php');
	   		$dbresult = mysql_query ("SELECT * FROM mtbluser where username='".$username."' and password='".$password."' ",$dlink);  			
	          $count = mysql_num_rows($dbresult);
			  $result=mysql_fetch_assoc($dbresult);
			  
     if($count>0)
	 {
		 $_SESSION['userlogin'] =1;
		  $_SESSION['usernam'] =$result['name'];
	?>	
   <script type="text/javascript" >
  window.location='index.php';
  </script>
  <?php
	 }
	 else
	 {
			?>	
   <script type="text/javascript" >
  window.location='index.php?loginmsg=رمز عبور یا نام کاربری اشتباه است';
  </script>
  <?php	 
	 }
   }
else
	 {
			?>	
   <script type="text/javascript" >
  window.location='index.php?loginmsg=شما باید لاگین کنید!';
  </script>
  <?php	 
	 }

?>