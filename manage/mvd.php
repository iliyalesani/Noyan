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
	  $dbresult = mysql_query("select * from mtbldownload where id =".$id ,$dlink);
	  $post = mysql_fetch_assoc($dbresult);
	      $dbresult2 = mysql_query("select title from mtblsubmenu where parentid=3 and id =".$post['subjectid'] ,$dlink);
	      $post2 = mysql_fetch_assoc($dbresult2);

	  echo ('
	  <div id="main_column">
	  	  گروه:'.$post2['title'].' <br />
	   تاریخ ارسال:'.$post['writedate'].' <br />
	   ساعت ارسال:'.$post['writetime'].' <br />
	  	<div class="bodypost"> <br />
			<div class="post-title_read">
		    	<h1 class="p-title-mid">'.$post['titr'].' </h1>
		 	</div>
			<div class="post-content">
<br/><p style=" margin-right:30px; width:600px; font-style:italic;pading:50px; color:gray;">'.$post['shorttext'].'</p><br/>
<center><a href="download.php?id='.$post['id'].'"><img class="postimage" src="../'.$post['image'].'"  alt="'.$post['titr'].'"></img></a>	</center>
		    <div class="post-text" style="position:relative;">
			'.$post['longtext'].'
			<br /><br />
		 ');
		 echo('<div class="downloadpanel divdownload">
		   <p style="color:#658103; font-size:17px;margin-right:50px;"  >
		   لینک های دانلود
		   </p>');
		   
		   if ($post['link1'] <> "")
		   echo ('
		   <a  style="color:blue" href="'.$post['link1'].'">لینک دانلود اول .  '.$post['linktitle1'].'</a>
		   &nbsp;&nbsp;&nbsp;&nbsp;');
		   if ($post['linkpass1'] <> "")
		   echo ('    رمز فایل: '.$post['linkpass1']);
		   
		   echo '<br/>';
		   
		    if ($post['link2'] <> "")
		   echo ('
		   <a  style="color:blue" href="'.$post['link2'].'">لینک دانلود دوم .  '.$post['linktitle2'].'</a>
		   &nbsp;&nbsp;&nbsp;&nbsp;');
		   if ($post['linkpass2'] <> "")
		   echo ('    رمز فایل: '.$post['linkpass2']);
		   
		    echo '<br/>';
		   
		  if ($post['link3'] <> "")
		   echo ('
		   <a  style="color:blue" href="'.$post['link3'].'">لینک دانلود سوم .  '.$post['linktitle3'].'</a>
		   &nbsp;&nbsp;&nbsp;&nbsp;');
		   if ($post['linkpass3'] <> "")
		   echo ('    رمز فایل: '.$post['linkpass3']);

		   echo ('</div><br /> <br /><br /> <br />	<div class="p-mid">
                     <br /> <br /></div>    </div>  </div>     <div class="post-b-bg"></div>   </div>  ');  

  $dbresult = mysql_query("select * from mtblcomment where pagename = 'download.php' and postid =".$id ,$dlink);
 
	echo('
	<div class="bodypost"> <br />
			<div class="post-title">
		    	<div class="p-title-mid">دیدگاه های این پست</div>
		 	</div>
			<div class="post-content">');
		    while($comment = mysql_fetch_assoc($dbresult))
 			 {
           echo('
		   <div class="commentbox" style=" border-bottom:1px solid black;background-color:white; " >
		   دیدکاه  '.$comment['name'].':
		   <br/> 
		    '.$comment['comment'].'   
		 <div id="del"  style="float:left;">
			<a  onclick="return confirm_delete2();" style="color:red;" href="mdcoment.php?id='.$comment['id'].'&id_back='.$id.'&type_back=2">حذف</a>
			</div> 
		   </div>
        
      
    
	 ');
			 }
     echo('</div><div class="post-b-bg"></div>
   </div>
	');
	  }
   ?>
   <!-- write commend-->

   
 </div>
 
 <!-- end of main column -->
            


	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include 'includes/footer.php'; ?>