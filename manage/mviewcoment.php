<?php
session_start();

?>
<?php include 'includes/header.php'; ?>

<div id="templatemo_content" >
<div id="main_column" style="direction:rtl;">
 <?php
 	  $page_type = $_GET['page_type'];
	  
	  if (!is_numeric($page_type))
	  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = 'erorr 404.php'
			 </script>
        <?php
	  }
	  else
	  {
include('includes/bankselect.php');

?>

<select name="pagetype"  style="float:left;margin-top:20px;margin-left:20px;"onchange="location =   this.options[this.selectedIndex].value;" >
		                 <option   value="">انتخاب کنید</option>
 <option   value="mviewcoment.php?page_type=<?php echo $_GET['page_type'] ?>&pageviewtype=1">تایید نشده</option>
 <option   value="mviewcoment.php?page_type=<?php echo $_GET['page_type'] ?>&pageviewtype=2">تایید شده</option>
 <option  value="mviewcoment.php?page_type=<?php echo $_GET['page_type'] ?>&pageviewtype=3">همه</option>
</select><br />


<?php
$pageviewtype=1;
if(isset($_GET['pageviewtype']))
 $pageviewtype=$_GET['pageviewtype'];
if($page_type==1)
{
if($pageviewtype==1)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblpost p where c.postid=p.id and pagename = 'post.php' and readed=0" ,$dlink);
  else 
  if($pageviewtype==2)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblpost p where c.postid=p.id and pagename = 'post.php' and readed=1" ,$dlink);
  if($pageviewtype==3)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblpost p where c.postid=p.id and pagename = 'post.php' " ,$dlink);
 
	echo('
	<div class="bodypost" style=" direction:rtl;position:relative;"> <br />
			<div class="post-title">
		    	<div class="p-title-mid">نظرات جدید</div>
		 	</div>
			<div class="post-content" > ');
		    while($comment = mysql_fetch_assoc($dbresult))
 			 {
           echo('<br/>
		   <div class="commentbox" style="padding-bottom:40px;direction:rtl;  margin-bottom:5px">
		     <span >'.$comment['titr'].'</span><br/>
		   فرستنده :'.$comment['name'].'<br/>
		   ایمیل :'.$comment['email'].'<br/>
		    '.$comment['comment'].'  
			 <div id="del"  style="float:left;">
			<a  onclick="return confirm_delete2();" style="color:red;" href="mdcoment.php?id='.$comment['id'].'&id_back=0&type_back=3">حذف</a><br /><br />
			<a  onclick="return confirm_delete2();" style=" font-size:17px; color:green; " href="redcoment.php?id='.$comment['id'].'&type_back=1">تایید</a>
			</div> 
		   </div> 

		   
	 ');
			 }
     echo('<br /></div><div class="post-b-bg"></div>
   </div>
	');
}
else if($page_type==2)
{
if($pageviewtype==1)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtbldownload p where c.postid=p.id and pagename = 'download.php' and readed=0 " ,$dlink);
  else if($pageviewtype==2)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtbldownload p where c.postid=p.id and pagename = 'download.php' and readed=1 " ,$dlink);
    else if($pageviewtype==3)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtbldownload p where c.postid=p.id and pagename = 'download.php'  " ,$dlink);
 
	echo('
	<div class="bodypost" style="position:relative;"> <br />
			<div class="post-title">
		    	<div class="p-title-mid">دیدگاه های جدید</div>
		 	</div>
			<div class="post-content" > ');
		    while($comment = mysql_fetch_assoc($dbresult))
 			 {
           echo('<br/>
		   <div class="commentbox" style="padding-bottom:40px;  margin-bottom:5px">
		     <span >'.$comment['titr'].'</span><br/>
		   فرستنده :'.$comment['name'].'<br/>
		   ایمیل :'.$comment['email'].'<br/>
		    '.$comment['comment'].'  
			 <div id="del"  style="float:left;">
			<a  onclick="return confirm_delete2();" style="color:red;" href="mdcoment.php?id='.$comment['id'].'&id_back=0&type_back=4">حذف</a><br /><br />
			<a  onclick="return confirm_delete2();" style=" font-size:17px; color:green; " href="redcoment.php?id='.$comment['id'].'&type_back=2">تایید</a>
			</div> 
		   </div> 
		   
	 ');
			 }
     echo('<br /></div><div class="post-b-bg"></div>
   </div>
	');
}	
else if($page_type==3)
{
if($pageviewtype==1)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblmovie p where c.postid=p.id and pagename = 'movie.php' and readed=0" ,$dlink);
  else if($pageviewtype==2)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblmovie p where c.postid=p.id and pagename = 'movie.php' and readed=1" ,$dlink);
  else if($pageviewtype==3)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblmovie p where c.postid=p.id and pagename = 'movie.php'" ,$dlink);
 
	echo('
	<div class="bodypost" style=" direction:rtl;position:relative;"> <br />
			<div class="post-title">
		    	<div class="p-title-mid">دیدگاه های جدید</div>
		 	</div>
			<div class="post-content" > ');
		    while($comment = mysql_fetch_assoc($dbresult))
 			 {
           echo('<br/>
		   <div class="commentbox" style="padding-bottom:40px;direction:rtl;  margin-bottom:5px">
		     <span >'.$comment['titr'].'</span><br/>
		   فرستنده :'.$comment['name'].'<br/>
		   ایمیل :'.$comment['email'].'<br/>
		    '.$comment['comment'].'  
			 <div id="del"  style="float:left;">
			<a  onclick="return confirm_delete2();" style="color:red;" href="mdcoment.php?id='.$comment['id'].'&id_back=0&type_back=3">حذف</a><br /><br />
			<a  onclick="return confirm_delete2();" style=" font-size:17px; color:green; " href="redcoment.php?id='.$comment['id'].'&type_back=1">تایید</a>
			</div> 
		   </div> 

		   
	 ');
			 }
     echo('<br /></div><div class="post-b-bg"></div>
   </div>
	');
}
else if($page_type==4)
{
if($pageviewtype==1)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblaudio p where c.postid=p.id and pagename = 'news.php' and readed=0" ,$dlink);
  else if($pageviewtype==2)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblaudio p where c.postid=p.id and pagename = 'news.php' and readed=1" ,$dlink);
    else if($pageviewtype==3)
  $dbresult = mysql_query("select c.*,p.titr from mtblcomment c , mtblaudio p where c.postid=p.id and pagename = 'news.php' " ,$dlink);
 
	echo('
	<div class="bodypost" style=" direction:rtl;position:relative;"> <br />
			<div class="post-title">
		    	<div class="p-title-mid">دیدگاه های جدید</div>
		 	</div>
			<div class="post-content" > ');
		    while($comment = mysql_fetch_assoc($dbresult))
 			 {
           echo('<br/>
		   <div class="commentbox" style="padding-bottom:40px;direction:rtl;  margin-bottom:5px">
		     <span >'.$comment['titr'].'</span><br/>
		   فرستنده :'.$comment['name'].'<br/>
		   ایمیل :'.$comment['email'].'<br/>
		    '.$comment['comment'].'  
			 <div id="del"  style="float:left;">
			<a  onclick="return confirm_delete2();" style="color:red;" href="mdcoment.php?id='.$comment['id'].'&id_back=0&type_back=3">حذف</a><br /><br />
			<a  onclick="return confirm_delete2();" style=" font-size:17px; color:green; " href="redcoment.php?id='.$comment['id'].'&type_back=1">تایید</a>
			</div> 
		   </div> 

		   
	 ');
			 }
     echo('<br /></div><div class="post-b-bg"></div>
   </div>
	');
}

  }
   ?>
   <!-- write commend-->

   
 </div>
 
 <!-- end of main column -->
            

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include 'includes/footer.php'; ?>