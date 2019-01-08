<?php
session_start();

?>
<?php include 'includes/header.php'; ?>

<div id="templatemo_content">
 <?php
 	  $id = $_GET['id'];
	  
	  if (!is_numeric($id))
	  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = 'erorr 404.php'
			 </script>
        <?php
	  }
	  else
	  {
include('includes/bankselect.php');

   if($_GET['type']==1)
   {
	  
		$dbresult = mysql_query("select m.*,u.username as uname from mtblmessage m,mtbluser u where m.Sender=u.id and m.id =".$id." union
		   select m.*,'مهمان' as uname from mtblmessage m where  m.Reciver=0 and m.Sender=-1 and m.id =".$id ,$dlink);
		$post = mysql_fetch_assoc($dbresult);
		echo ('
		<div id="main_column">
         ارسال کننده: '.$post['uname'].' <br />
		 تاریخ ارسال: '.$post['SendDate'].' <br />
		 ساعت ارسال: '.$post['SendTime'].' <br />
		  <div class="bodypost"> <br />
			  <div class="post-title">
				  <div class="p-title-mid">'.$post['Title'].' </div>
			  </div>
			  <div class="post-content">
  
			  <div class="post-text1" style="position:relative;">
			  '.$post['Text'].'
			  <div class="p-mid">
  
			 <br />
			 <br />
			 <br />
			 </div>
		 </div>
	   </div>
	   <div class="post-b-bg"></div>
	 </div>
	 ');
   }
   else    if($_GET['type']==2)
   {
	  
		$dbresult = mysql_query("select m.*,u.username as uname from mtblmessage m,mtbluser u where m.Reciver=u.id and m.id =".$id ,$dlink);
		$post = mysql_fetch_assoc($dbresult);
		echo ('
		<div id="main_column">
         دریافت کننده: '.$post['uname'].' <br />
		 تاریخ ارسال:'.$post['SendDate'].' <br />
		 ساعت ارسال:'.$post['SendTime'].' <br />
		  <div class="bodypost"> <br />
			  <div class="post-title">
				  <div class="p-title-mid">'.$post['Title'].' </div>
			  </div>
			  <div class="post-content">
  
			  <div class="post-text1" style="position:relative;">
			  '.$post['Text'].'
			  <div class="p-mid">
  
			 <br />
			 <br />
			 <br />
			 </div>
		 </div>
	   </div>
	   <div class="post-b-bg"></div>
	 </div>
	 ');
   }
	  }
 mysql_query("update mtblmessage  set Readed=1 where Reciver=0 and ID=". $id." ",$dlink);
   ?>
   <!-- write commend-->

   
 </div>
 
 <!-- end of main column -->
            

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include 'includes/footer.php'; ?>