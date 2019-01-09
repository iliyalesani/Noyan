<!DOCTYPE  html>
<html  lang="fa">
	<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="fa" />
<link rel="shortcut icon" href="sourcecodes.ico" />
     <?php
	 session_start();
	 	  include('bankselect.php');
//=================================================
$dbresult=mysql_query ("select *  from  `viewsite`  WHERE ID=0",$dlink);
$result=mysql_fetch_assoc($dbresult);
$All=$result['All'];
$Day=$result['Day'];
$LastDay=$result['LastDay'];
$LastDate=$result['LastDate'];

$All++;
$Day++;
include 'jdf.php'; 
$shamsidate=jdate('Y/m/d');
if($LastDate != $shamsidate)
{
	$LastDate= $shamsidate;
	$LastDay=$Day;
	$Day=1;
	$All++;
}


$sql="UPDATE `viewsite` SET  
		 `All` = ".$All." ,
		 `Day` = ".$Day." ,
		 `LastDay` = ".$LastDay.",
		 `LastDate` = '".$LastDate."'
		 WHERE ID =0";
		 
		 mysql_query ($sql,$dlink);
		 
//=================================================

			$dbresult = mysql_query ("SELECT * FROM sbtblstores",$dlink);
			$Store = mysql_fetch_assoc($dbresult);
	
$pagetitle=$Store['Title'];
$pagetags=$Store['Tags'];
$pagediscription=$Store['description'];
$pageimage= $Store['WebAddress'].'/'.$Store['Logo'];
if(isset($_GET['id']))
{
if(basename($_SERVER['PHP_SELF']) == 'post.php') 
{
		if (isset($_GET['id']) && is_numeric($_GET['id']) )
		{
  $dbresult = mysql_query ("SELECT titr,image,keywords,description FROM mtblpost where id=".$_GET['id'],$dlink);
  $postinfo = mysql_fetch_assoc($dbresult);
  $pagetitle = $postinfo['titr'];
		}
}
else  if(basename($_SERVER['PHP_SELF']) == 'download.php') 
{
		if (isset($_GET['id']) && is_numeric($_GET['id']) )
		{
  $dbresult = mysql_query ("SELECT titr,image,keywords,description FROM mtbldownload where id=".$_GET['id'],$dlink);
  $postinfo = mysql_fetch_assoc($dbresult);
  $pagetitle = $postinfo['titr'];
		}
}
else  if(basename($_SERVER['PHP_SELF']) == 'news.php') 
{
		if (isset($_GET['id']) && is_numeric($_GET['id']) )
		{
  $dbresult = mysql_query ("SELECT titr,image,keywords,description FROM mtblaudio where id=".$_GET['id'],$dlink);
  $postinfo = mysql_fetch_assoc($dbresult);
  $pagetitle = $postinfo['titr'];
		}
}

}

		?>	
<title><?php echo $pagetitle ;?></title>

<meta name="keywords" content="<?php echo $pagetags ?>" />
<meta name="description" content="<?php echo $pagediscription ?>" />


	<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/ajax.js"></script>

<link href="css/maps.css" rel="stylesheet">

<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/maps.js"></script>
<script type="text/javascript">$(document).ready(function(){$().orion({speed: 50,animation: "zoom"});});</script>

  <style type="text/css">#animate{float:left;position:relative;width:900px;height:300px;overflow:hidden}#animate  img{position:absolute;left:0;top:0;}</style>
  <script language="JavaScript" type="text/javascript">
  /*<![CDATA[*/
  $(function(){
    $('#animate img:gt(0)').hide();
    setInterval(function(){
      $('#animate :first-child').animate({left:"900px"},1000).fadeOut().animate({left:"0"})
         .next('img').fadeIn(1000)
         .end().appendTo('#animate');},
      4000);
});
  /*]]>*/
  </script>

<script type="text/javascript">
function closemsg()
{
	document.getElementById('messagebox22').hidden=true;
	}
</script>
	</head>
	
	<body class="home">
    <div id="topdiv"><a href="index.php" ><img class="logo" src="<?php echo $Store['Logo']; ?>" alt="<?php echo $Store['Title']?>" /></a></div>

<div class="contentmenu">
  <ul class="orion-menu green">
    <li><a href="index.php">خانه</a></li>
    <li><a href="viewnews.php?title=آخرین اخبار">اخبار</a></li>
      <li><a href="#">املاک</a>
      <ul>
                    <?php    
                $dbsubmenu = mysql_query("select id,title from mtblsubmenu where parentid =3 and parent=0",$dlink); 
       			while($dbsubject = mysql_fetch_assoc($dbsubmenu))
				{
					echo '<li><a href="posts.php?cat=3&subject='.$dbsubject['id'].'&title='.
						 str_replace(' ','-', $dbsubject['title']).'">'.$dbsubject['title'].'</a> <ul>';
						 
				   $dbsubmenu2 = mysql_query("select id,title from mtblsubmenu where parentid =3 and parent=".$dbsubject['id'],$dlink); 
					while($dbsubject2 = mysql_fetch_assoc($dbsubmenu2))
					{
							echo '<li><a href="posts.php?cat=3&subject='.$dbsubject2['id'].'&title='.
						 str_replace(' ','-', $dbsubject2['title']).'">'.$dbsubject2['title'].'</a></li>';
					}
						 echo'</ul></li>';
			    }
				?>
      </ul>
    </li>
    
    <li><a href="about.php">درباره ما</a></li>
    <li><a href="contact.php">تماس با ما</a></li>
  </ul>
</div>
    <br>
<br>
    <br>
<br>    <br>
<br>
    
    	<div id="beforewarper">
<div id="animate">
                 <?php 
          $dbsliders = mysql_query("select * from mtblslider where enabled=1",$dlink); 
       			while($dbslider = mysql_fetch_assoc($dbsliders))
				{
				?>
<img src="<?php echo $dbslider['image'] ?>" alt="<?php echo $dbslider['shorttext'] ?>"  />

                <?php 
				}
				?>

</div>
        </div>
    
  