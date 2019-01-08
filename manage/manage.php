<?php 
session_start();
  if ($_SESSION['Logedin'] != 1)
		  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = '../karsazlogin/index.php?msg= شما باید وارد شوید';
			
            </script>
            <?php			
		  }
include('includes/header.php');?>


 <?php include('includes/bankselect.php');?>
<div id="templatemo_content">
<?php
if(is_numeric($_GET["type"]))
{
	if ( isset( $_GET["type"] ))
	$pagetype=$_GET["type"];
	else
	$pagetype=0;
	
	if ( isset( $_GET["msg"] ))
	$pagemsg=$_GET["msg"];
	else
	$pagemsg='';
}
else
{
	echo('
	<script type="text/javascript" >
window.location="erorr404.php";
</script>');

	}

?>
<div id="main_column">
<div class="mgbox">
<?php
      echo( $pagemsg);
?>
</div>
<div class="hovergallery">
<?php
       if($pagetype==2 || $pagetype==7)
		{
		echo('<a style="background-color:green" href="mid.php">درج ملک جدید</a>');
		echo('<a style="background-color:green" href="manage.php?type=7&msg=قسمت مدیریت ملک ها">انتخاب ملک ویژه</a>');
		$dbresult = mysql_query("select count(*) as cnt from mtblcomment where pagename = 'download.php' and readed=0",$dlink);
		$post = mysql_fetch_assoc ($dbresult);
		$count=$post['cnt'];
		echo('<a style="background-color:green" href="mviewcoment.php?page_type=2">نمایش دیدگاه ها('.$count.')</a>');
		}
		else if($pagetype==11)
		{
		echo('<a style="background-color:green" href="mi_audio.php">درج خبر جدید</a>');
		$dbresult = mysql_query("select count(*) as cnt from mtblcomment where pagename = 'news.php' and readed=0",$dlink);
		$post = mysql_fetch_assoc ($dbresult);
		$count=$post['cnt'];
		echo('<a style="background-color:green" href="mviewcoment.php?page_type=4">نمایش دیدگاه ها('.$count.')</a>');
		}
		else if($pagetype==3)
		echo('<a  style="background-color:green" href="mim.php">درج دسته جدید</a>');
		else if($pagetype==4  || $pagetype==8)
		{
		echo('<a  style="background-color:green"  target="_blank" href="../register.php">درج کاربر جدید</a>');
		}
		else if($pagetype==6)
		echo('<a  style="background-color:green" href="mislider.php">درج اسلایدر جدید</a>');
		else if($pagetype==9)
		echo('<a  style="background-color:green" href="miadvertise.php">درج تبلیغات جدید</a>');
?>
</div>
<br /><br /><br />
<center>
<div class="titrbox">
<?php
if($pagetype==2)
echo('لیست آخرین کالا ها');
else if($pagetype==11)
echo('لیست آخرین اخبار');
else if($pagetype==3)
echo('لیست دسته ها');
else if($pagetype==4)
echo('لیست کاربران');
?>
</div></center>
</b>
 <table width="100%"  align="center" style="overflow:hidden; list-style-position:inside;"   >

  <?php
      
	  		 $pageviewtype=1;
			 if(isset($_GET['pageviewtype']))
			   $pageviewtype=$_GET['pageviewtype'];
						
      if($pagetype==1)// post   maghalat
		   {
			    echo(' <tr id="main_column_tr" > <td>ردیف</td><td>کد</td><td>موضوع</td><td>عکس</td><td>تیتر</td><td>ویرایش</td><td>انتشار</td><td>حذف</td></tr>');
				if( $pageviewtype==1)
			     $dbresult = mysql_query("select p.*,s.title as tit from mtblpost p ,mtblsubmenu s where p.subjectid=s.id union select p.*,'نامشخص' as tit from mtblpost p ,mtblsubmenu s where p.subjectid Not IN(select id from mtblsubmenu) order by  id desc ",$dlink);
			   else if( $pageviewtype==2)
			     $dbresult = mysql_query("select p.*,s.title as tit from mtblpost p ,mtblsubmenu s where p.subjectid=s.id and p.type=1 union select p.*,'نامشخص' as tit from mtblpost p ,mtblsubmenu s where p.subjectid Not IN(select id from mtblsubmenu) and p.type=1 order by  id desc ",$dlink);
			   else if( $pageviewtype==3)
			     $dbresult = mysql_query("select p.*,s.title as tit from mtblpost p ,mtblsubmenu s where p.subjectid=s.id and p.type=2 union select p.*,'نامشخص' as tit from mtblpost p ,mtblsubmenu s where p.subjectid Not IN(select id from mtblsubmenu) and p.type=2 order by  id desc ",$dlink);
			   else if( $pageviewtype==4)
			     $dbresult = mysql_query("select p.*,s.title as tit from mtblpost p ,mtblsubmenu s where p.subjectid=s.id and p.type=3 union select p.*,'نامشخص' as tit from mtblpost p ,mtblsubmenu s where p.subjectid Not IN(select id from mtblsubmenu) and p.type=2 order by  id desc ",$dlink);

				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					$pub='<img src="includes/img/pub1.png" title="انتشار"/>';
					$style=' font-size: 15px; color:gray;';
					$type_p=1;
					if($post['published']==1)
					{
					$pub='<img src="includes/img/pub2.png" title="عدم انتشار"/>';
					$style='font-size: 16px; color:black;';
					$type_p=0;
					}
					echo('
					<tr id="'.$rs.'">
					  <td>'.$radif.'</td>
					  <td>'.$post['id'].'</td>
					  <td>'.$post['tit'].'</td>
					  <td><img src="../'.$post['image'].'" width="40" height="25" /></td>
					  <td><a style="'.$style.'" href="mvp.php?type_back='.$pagetype.'&id='.$post['id'].'" >'.$post['titr'].'</a> </td>
					  <td  onclick="return confirm_delete2();"><a href="mep.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_publish.php?type_back='.$pagetype.'&id='.$post['id'].'&type='.$type_p.'" >'.$pub.'</a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back=1&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
     else    if($pagetype==2)//download ha
		   {
			   			    echo(' <tr id="main_column_tr" ><td>ردیف</td> <td>کد</td><td>موضوع</td><td>عکس</td><td>تیتر</td><td>تعداد بازدید</td><td>ویرایش</td><td>انتشار</td><td>حذف</td></tr>');
				if( $pageviewtype==1)
$dbresult = mysql_query("select d.*,s.title as tit from mtbldownload d ,mtblsubmenu s where d.subjectid=s.id union select d.*,'نامشخص' as tit from mtbldownload d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) order by  id desc",$dlink);
			   else if( $pageviewtype==2)
$dbresult = mysql_query("select d.*,s.title as tit from mtbldownload d ,mtblsubmenu s where d.subjectid=s.id  and d.type=1  union select d.*,'نامشخص' as tit from mtbldownload d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) and d.type=1 order by  id desc",$dlink);
			   else if( $pageviewtype==3)
$dbresult = mysql_query("select d.*,s.title as tit from mtbldownload d ,mtblsubmenu s where d.subjectid=s.id  and d.type=2  union select d.*,'نامشخص' as tit from mtbldownload d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) and d.type=2 order by  id desc",$dlink);
			   else if( $pageviewtype==4)
$dbresult = mysql_query("select d.*,s.title as tit from mtbldownload d ,mtblsubmenu s where d.subjectid=s.id  and d.type=3  union select d.*,'نامشخص' as tit from mtbldownload d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) and d.type=3 order by  id desc",$dlink);
			   else if( $pageviewtype==5)
$dbresult = mysql_query("select d.*,s.title as tit from mtbldownload d ,mtblsubmenu s where d.subjectid=s.id  and d.type=4  union select d.*,'نامشخص' as tit from mtbldownload d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) and d.type=4 order by  id desc",$dlink);

				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					$pub='<img src="includes/img/pub1.png" title="انتشار"/>';
					$style=' font-size: 15px; color:gray;';
					$type_p=1;
					if($post['published']==1)
					{
						$pub='<img src="includes/img/pub2.png" title="عدم انتشار"/>';
					$style='font-size: 16px; color:black;';
					$type_p=0;
					}
					echo('
					<tr id="'.$rs.'">
					<td>'.$radif.'</td>
					  <td>'.$post['id'].'</td>
					  <td>'.$post['tit'].'</td>
					  <td><img src="../'.$post['image'].'" width="40" height="25" /></td>
					  <td><a style="'.$style.'" href="mvd.php?id='.$post['id'].'" >'.$post['titr'].'</a> </td>
					  <td>'.$post['view'].'</td>
					  <td  onclick="return confirm_delete2();"><a href="med.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_publish.php?type_back='.$pagetype.'&id='.$post['id'].'&type='.$type_p.'" >'.$pub.'</a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
		else    if($pagetype==10)//movies
		   {
			   			    echo(' <tr id="main_column_tr" ><td>ردیف</td> <td>کد</td><td>موضوع</td><td>عکس</td><td>تیتر</td><td>ویرایش</td><td>انتشار</td><td>حذف</td></tr>');
	if( $pageviewtype==1)
$dbresult = mysql_query("select d.*,s.title as tit from mtblmovie d ,mtblsubmenu s where d.subjectid=s.id union select d.*,'نامشخص' as tit from mtblmovie d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) order by  id desc",$dlink);
			   else if( $pageviewtype==2)
$dbresult = mysql_query("select d.*,s.title as tit from mtblmovie d ,mtblsubmenu s where d.subjectid=s.id and d.type=1 union select d.*,'نامشخص' as tit from mtblmovie d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=1 order by  id desc",$dlink);
			   else if( $pageviewtype==3)
$dbresult = mysql_query("select d.*,s.title as tit from mtblmovie d ,mtblsubmenu s where d.subjectid=s.id  and d.type=2 union select d.*,'نامشخص' as tit from mtblmovie d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=2 order by  id desc",$dlink);
			   else if( $pageviewtype==4)
$dbresult = mysql_query("select d.*,s.title as tit from mtblmovie d ,mtblsubmenu s where d.subjectid=s.id  and d.type=3 union select d.*,'نامشخص' as tit from mtblmovie d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=3 order by  id desc",$dlink);


				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					$pub='<img src="includes/img/pub1.png" title="انتشار"/>';
					$style=' font-size: 15px; color:gray;';
					$type_p=1;
					if($post['published']==1)
					{
						$pub='<img src="includes/img/pub2.png" title="عدم انتشار"/>';
					$style='font-size: 16px; color:black;';
					$type_p=0;
					}
					echo('
					<tr id="'.$rs.'">
					<td>'.$radif.'</td>
					  <td>'.$post['id'].'</td>
					  <td>'.$post['tit'].'</td>
					  <td><img src="../'.$post['image'].'" width="40" height="25" /></td>
					  <td><span style="'.$style.'" >'.$post['titr'].'</span> </td>
					  <td  onclick="return confirm_delete2();"><a href="me_movie.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_publish.php?type_back='.$pagetype.'&id='.$post['id'].'&type='.$type_p.'" >'.$pub.'</a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
	     else    if($pagetype==11)//audios
		   {
			   			    echo(' <tr id="main_column_tr" ><td>ردیف</td> <td>کد</td><td>موضوع</td><td>عکس</td><td>تیتر</td><td>تعداد بازدید</td><td>ویرایش</td><td>انتشار</td><td>حذف</td></tr>');
				if( $pageviewtype==1)
$dbresult = mysql_query("select d.*,s.title as tit from mtblaudio d ,mtblsubmenu s where d.subjectid=s.id union select d.*,'نامشخص' as tit from mtblaudio d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu) order by  id desc",$dlink);
			   else if( $pageviewtype==2)
$dbresult = mysql_query("select d.*,s.title as tit from mtblaudio d ,mtblsubmenu s where d.subjectid=s.id and d.type=1 union select d.*,'نامشخص' as tit from mtblaudio d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=1  order by  id desc",$dlink);
			   else if( $pageviewtype==3)
$dbresult = mysql_query("select d.*,s.title as tit from mtblaudio d ,mtblsubmenu s where d.subjectid=s.id  and d.type=2  union select d.*,'نامشخص' as tit from mtblaudio d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=2  order by  id desc",$dlink);
			   else if( $pageviewtype==4)
$dbresult = mysql_query("select d.*,s.title as tit from mtblaudio d ,mtblsubmenu s where d.subjectid=s.id  and d.type=3  union select d.*,'نامشخص' as tit from mtblaudio d ,mtblsubmenu s where d.subjectid Not IN(select id from mtblsubmenu)  and d.type=3  order by  id desc",$dlink);
				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					$pub='<img src="includes/img/pub1.png" title="انتشار"/>';
					$style=' font-size: 15px; color:gray;';
					$type_p=1;
					if($post['published']==1)
					{
						$pub='<img src="includes/img/pub2.png" title="عدم انتشار"/>';
					$style='font-size: 16px; color:black;';
					$type_p=0;
					}
					echo('
					<tr id="'.$rs.'">
					<td>'.$radif.'</td>
					  <td>'.$post['id'].'</td>
					  <td>'.$post['tit'].'</td>
					  <td><img src="../'.$post['image'].'" width="40" height="25" /></td>
					  <td><span style="'.$style.'" >'.$post['titr'].'</span> </td>
					  <td>'.$post['view'].'</td>
					  <td  onclick="return confirm_delete2();"><a href="me_audio.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_publish.php?type_back='.$pagetype.'&id='.$post['id'].'&type='.$type_p.'" >'.$pub.'</a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
	 else    if($pagetype==3)//submenu
		   {
			   			    echo(' <tr id="main_column_tr" > <td>کد</td><td>مجموعه</td><td>سردسته</td><td>موضوع</td><td>ویرایش</td><td>حذف</td></tr>');
	          $dbresult = mysql_query("
 select s.id,m.title as mt,s2.title as ptitle,s.title,s.link from mtblsubmenu s,mtblsubmenu s2,mtblmenu m where m.id=s.parentid  and  s2.id=s.parent
			union 
 select s.id,m.title as mt,'ندارد' as ptitle,s.title,s.link from mtblsubmenu s,mtblmenu m where m.id=s.parentid  and  s.parent=0	  
			   order by  id desc ",$dlink);
				$rowstyle=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					echo('
					<tr id="'.$rs.'">
					  <td>'.$post['id'].'</td>
					  <td>'.$post['mt'].'</td>
					  <td>'.$post['ptitle'].'</td>
					  <td style="font-size: 17px; color:black;">'.$post['title'].'</td>
					  <td  onclick="return confirm_delete2();"><a href="mem.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
		 else    if($pagetype==6)//sliders
		   {
			   			    echo(' <tr id="main_column_tr" > <td>عکس</td><td>کد</td><td>عنوان</td><td>توضیحات</td><td>لینک</td><td>ویرایش</td><td>حذف</td></tr>');
	          $dbresult = mysql_query("select * from mtblslider",$dlink);
				$rowstyle=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					$style=' font-size: 15px; color:gray;';
					if($post['enabled']==1)
					{
					$style='font-size: 20px; color:black;';
					}
					echo('
					<tr id="'.$rs.'">
					  
					  <td><img src="../'.$post['image'].'" width="100" height="70" /></td>
					  <td>'.$post['id'].'</td>
					  <td>'.$post['titr'].' </td>
					   <td>'.$post['shorttext'].' </td>
					    <td>'.$post['link'].' </td>
					  <td  onclick="return confirm_delete2();"><a href="meslider.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
	         }
		   }
		   		 else    if($pagetype==9)//advertise
		   {
			   			    echo(' <tr id="main_column_tr" > <td>عکس</td><td>کد</td><td>عنوان</td><td>لینک</td><td>ویرایش</td><td>حذف</td></tr>');
	          $dbresult = mysql_query("select * from mtbladvertise",$dlink);
				$rowstyle=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					$style=' font-size: 15px; color:gray;';
					if($post['enabled']==1)
					{
					$style='font-size: 17px; color:black;';
					}
					echo('
					<tr id="'.$rs.'">			
					  <td><img src="../'.$post['image'].'" width="150" height="50" /></td>
					  <td>'.$post['id'].'</td>
     				  <td>'.$post['titr'].' </td>
	   			    <td>'.$post['link'].' </td>
					  <td  onclick="return confirm_delete2();"><a href="meadvertise.php?type_back='.$pagetype.'&id='.$post['id'].'" ><img src="includes/img/edit.png" title="ویرایش"/></a></td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
	         }
		   }
		  else    if($pagetype==7)//special download select
		   {
			 $dbresult = mysql_query("select * from mtbldownload",$dlink);
			 ?>
			  <form action="m_selectd_s_d.php" method="post" style="font-size:16px; line-height:22px;"  enctype="multipart/form-data">
              <input type="hidden" name="type_back" value="7" />
			  تیتر کالا:<br />
			  <select name="postid"   class="formstyle2" >
            <?php
				$dbresult = mysql_query("select * from mtbldownload",$dlink);
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$selected='';
					if($post['name']=='vizhe')
					$selected='style="background-color:lightgreen;"';
					else
					$selected='';
					echo('<option '.$selected.' value="'.$post['id'].'">'.$post['titr'].'</option>');					
				}
             ?>
			  </select> <br/>
    وضعیت:
<select name="selected"   class="formstyle1" >
<option   value="1">انتخاب</option>
<option  value="0">عدم انتخاب</option>
</select>
			  
			  <hr/>
					<input type="submit" value="انتخاب کالای ویژه" id="submit" style="width:230px;margin:10px;" name="submit" onclick="return confirm_delete();"   class="formstyleb1" />
					<input type="reset" value="لغو" id="reset" name="reset"  onclick="return confirm_delete();"  class="formstyleb2"  />
			  
			  </form>
              
              <?php
	        
		   }
	   else    if($pagetype==4)//users
		   {
			   echo(' <tr id="main_column_tr" > <td>ردیف</td><td>کد</td><td>نام </td><td>نام کاربری</td><td>ایمیل</td><td>حذف</td></tr>');
	         

			      $dbresult = mysql_query("select * from mtbluser where confirm=1 order by id desc  ",$dlink);
				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					
					echo('
					<tr id="'.$rs.'">
					  <td>'.$radif.'</td>
					   <td>'.$post['id'].'</td>
					  <td>'.$post['name'].'</td>
					    <td>'.$post['username'].'</td>
					  <td> '.$post['mail'].'</td>
							  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  ><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}

	         }
	   else    if($pagetype==8)//emails
		   {
			   			    echo(' <tr id="main_column_tr" > <td>ردیف</td><td>نام </td><td>ایمیل</td><td>حذف</td></tr>');
	          $dbresult = mysql_query("select * from mtblemaildl  order by id desc ",$dlink);
				$rowstyle=0;
				$radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{
					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					echo('
					<tr id="'.$rs.'">
					  <td>'.$radif.'</td>
					  <td>'.$post['name'].'</td>
					  <td style="font-size: 17px; color:black;">'.$post['email'].'</td>
					  <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back='.$pagetype.'&id='.$post['id'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
	         }
	
  ?>
</table>

         
         


</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>