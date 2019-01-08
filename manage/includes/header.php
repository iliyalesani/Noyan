<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <?php
	 	  include('bankselect.php');
			$dbresult = mysql_query ("SELECT * FROM sbtblstores",$dlink);
			$Store = mysql_fetch_assoc($dbresult);
		?>	
<title> <?php echo $Store['Title'] ?></title>

<link href="includes/m_templatemo_style.css?v=3" rel="stylesheet" type="text/css" />
<link href="mstyle.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

  function confirm_delete2() {
         return confirm("‌‌آیا  مطمئن هستید؟");
    }
</script>

	<script src="ckeditor/ckeditor.js"></script>

</head>
<body>


<div id="templatemo_site_title_bar_wrapper">

    <div id="templatemo_site_title_bar">
    
       <div id="site_title">
            <h1>
            <a href="#" target="_parent"><?php echo $Store['Title'] ?>
            </a>
            </h1>
        </div>
        
        <ul id="top_menu">
         <li class="first"><a href="manage.php?type=0">مدیریت</a></li>
            <li><a target="_blank" href="../index.php">نمایش سایت</a></li>
             <li><a  href="../login/logout.php">خروج</a></li>
        </ul>
    
    </div> <!-- end of site title bar -->
</div> <!-- end of site title bar wrapper -->

<div id="templatemo_banner_wrapper">
<div id="templatemo_banner">
<div id="banner_content">
<div class="hovergallery">
<ul style="list-style:none">
<li><a href="manage.php?type=3&msg=قسمت مدیریت دسته ها"  class="subjectm">مدیریت دسته ها</a></li>
<?php
		$dbresult = mysql_query("select count(*) as cnt from mtblcomment where pagename = 'download.php' and readed=0",$dlink);
		$post = mysql_fetch_assoc ($dbresult);
?>
<li><a href="manage.php?type=2&msg=قسمت مدیریت کالاها"  class="downloadm">مدیریت املاک<span style="color:#fff">(<?php echo $post['cnt'] ?>)</span></a></li>
<?php
		$dbresult = mysql_query("select count(*) as cnt from mtblcomment where pagename = 'news.php' and readed=0",$dlink);
		$post = mysql_fetch_assoc ($dbresult);
?>
<li><a href="manage.php?type=11&msg=قسمت مدیریت اخبار"  class="audiom">مدیریت اخبار<span style="color:#fff">(<?php echo $post['cnt'] ?>)</span></a></li>
<li><a href="me_settings.php?type_back=5"  class="settingm">تنظیمات اصلی</a></li>
<li><a href="manage.php?type=6&msg=قسمت مدیریت اسلایدر"  class="sliderm">مدیریت اسلایدر</a></li>
<li><a href="manage.php?type=9&msg=قسمت مدیریت تبلیغات"  class="advertisem">مدیریت تبلیغات</a></li>

     <?php
			$dbresult = mysql_query ("SELECT count(*) as cn  FROM mtblmessage where Readed=0 and Reciver=0",$dlink);
			$Store = mysql_fetch_assoc($dbresult);
		?>	 
 
<li><a href="adminmessages.php?type=1" class="messagem">پیام ها<span style="color:#fff">(<?php echo $Store['cn'] ?>)</span></a></li>

</ul>
</div>

</div>
</div>
</div> <!-- end of banner wrapper -->

<div id="templatemo_menu_wrapper">
<div id="templatemo_menu">

</div>
</div> <!-- end of menu wrapper -->