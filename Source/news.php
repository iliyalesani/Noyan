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
                
<?php

		if (isset($_GET['id']) && is_numeric($_GET['id']) )
		{
			mysql_query("update mtblaudio set view=view+1 where id=".$_GET['id'],$dlink);
              $dbresultpost = mysql_query("select * from mtblaudio where  published = 1 and id=".$_GET['id']  ,$dlink);
			  $post=mysql_fetch_assoc($dbresultpost);
  ?>              
                
				<!-- ENDS title -->
				<h1 class="contenth1 newsli" style="background-color:#333"><?php echo $post['titr'];?></h1>
				<!-- Portfolio -->
                
				<div class="maintext">
                    <div class="shorttext"><?php echo $post['shorttext'];?></div>

                    <center><img class="mainimg" src="<?php echo $post['image'];?>" alt="<?php echo $post['titr'];?>" /></center>
                  <br/><br/>
                    <?php echo $post['longtext'];?>
                     <br/><br/>
				</div>
				

				<!-- pagination -->	
				<div class="clear"></div>
                

		
<?PHP
		}
		else 	
		{
			
echo 'با عرض پوزش مطلب مورد نظر شما پیدا نشد';
		}
?>



					

<?php   
		if (isset($_GET['id']) && is_numeric($_GET['id']) )
		{
              $dbresultcomment = mysql_query("select * from mtblcomment where  readed = 1 and pagename='news.php' and postid=".$_GET['id']  ,$dlink);
			  $countcomment=mysql_num_rows( $dbresultcomment );
?>
					<!-- Comments-Block -->
					<div id="comments-block">
						<div class="n-comments"><?php echo $countcomment; ?></div> <div class="n-comments-text">نظرات</div>
						<!-- comments list -->
						<ul class="commentlist">

<?php
			  while($comment=mysql_fetch_assoc($dbresultcomment))
			  {
?>
							<li class="comment" id="comment-18">
								<div id="div-comment-18" class="comment-body">
									<div class="comment-author vcard">
										<img alt='' src='img/avatar.png' class='avatar avatar-60 photo' height='70' width='60' />
										<span class="says"><?php echo $comment['name']; ?>:</span>
									</div>
					
									<div class="comment-meta">
										 <?php echo $comment['date_time']; ?>
									</div>
					
									<p class="maincoment"><?php echo $comment['comment']; ?></p>
					
									<div class="reply">
										<a class='comment-reply-link' href="#">پاسخ</a>
									</div>
								</div>
							</li>
 <?php
			  }
		}
?>
                            
                              <br/><br/><br/>
						</ul>
						<!-- ENDS comments list -->
		
					</div>
					<!-- ENDS Comments-block -->	
		

								<h3 style="margin-right:10px">نظر خود را ارسال کنید</h3>	
								<!-- form -->
<br/>
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
    <td valign="middle">دیدگاه: </td>
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
    <td><input type="button" name="submit"  class="submit"  onClick="formget(this.form, 'savecomment.php');" value="ارسال نظر" /></td>
  </tr>
  
</table>                                     
        <input type="hidden" name="postid" id="postid" value="<?php echo $_GET['id'] ?>"/>
        <input type="hidden" name="pagename" id="pagename" value="<?php echo basename($_SERVER['PHP_SELF']); ?>"/>
 </form>
								<!-- ENDS form -->
<br/>
<br/>



			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>