<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
session_start();
if(isset($_GET['capcode']) && md5($_GET['capcode'])==$_SESSION['randomnr2'])
{
		if (isset ($_POST['name']));
		{
			     include('includes/bankselect.php');
			
			$name =clean( $_GET['name']);
			$email =clean( $_GET['email']);
			$comment =clean( $_GET['comment']);
			$postid = clean($_GET['postid']);
			$pagename =  clean($_GET['pagename']);
include_once('jdf.php');
$shamsidate=jdate('H:i:s').' __ '.jdate('Y/m/d');
  
			if ($pagename == 'post.php' || $pagename == 'download.php' || $pagename == 'movie.php' || $pagename == 'news.php')
			{
				$sql="INSERT INTO  `mtblcomment` (
`id` ,
`postid` ,
`name` ,
`email` ,
`comment` ,
`date_time` ,
`pagename` ,
`readed`,
`ip`
)
VALUES (
NULL ,  '".$postid."',  '".$name."',  '".$email."',  '".$comment."',  '".$shamsidate."',  '".$pagename."',  '0',  '".$_SERVER['REMOTE_ADDR']."'
);";
			mysql_query($sql,$dlink);
			// echo $sql;
			echo 'نظر شما ارسال شد و پس از تایید مدیر به نمایش در می آید';
				
			}

		}
}
 else
{
	echo 'کد امنیتی را به طور صحیح وارد کنید';

}
			 ?>
       
