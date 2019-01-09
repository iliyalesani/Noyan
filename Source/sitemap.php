<?php 


 include('includes/bankselect.php'); 
 include('jdf.php'); 
header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<?php
$dbresult = mysql_query("
select id,titr,writedate,writetime        from mtblpost where  published = 1  
union select id,titr,writedate,writetime  from mtbldownload where  published = 1  
union select id,titr,writedate,writetime  from mtblmovie where  published = 1 
union select id,titr,writedate,writetime  from mtblaudio where  published = 1 order by writedate desc ,writetime desc  limit 10",$dlink);
				$post = mysql_fetch_assoc ($dbresult);
				$jalalidate=$post['writedate'];
				$jalal=explode('/',$jalalidate);
				$miladidate=jalali_to_gregorian($jalal[0],$jalal[1],$jalal[2],'-');
				$milad=explode('-',$miladidate);
				if($milad[1]<10)
				  $milad[1]='0'.$milad[1];
				 if($milad[2]<10)
				  $milad[2]='0'.$milad[2];
				  $miladidate= $milad[0].'-'.$milad[1].'-'.$milad[2];
?>
    <url>
        <loc>http://www.sourcecodes.ir/</loc>
        <lastmod><?php echo $miladidate;?></lastmod>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
    </url>



	
                          <?php

 
                $dbsubmenu = mysql_query("select id,title from mtblsubmenu where parentid =3",$dlink); 
       			while($dbsubject = mysql_fetch_assoc($dbsubmenu))
				{
		  
					?>
    <url>
        <loc>http://www.sourcecodes.ir/<?php echo 'posts.php?cat=3&amp;subject='.$dbsubject['id'].'&amp;title='. str_replace(' ','-', $dbsubject['title']); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
				
					<?php 
					}
					?>

                          <?php
 
                $dbsubmenu = mysql_query("select id,title from mtblsubmenu where parentid =2",$dlink); 
       			while($dbsubject = mysql_fetch_assoc($dbsubmenu))
				{
		  
					?>
    <url>
        <loc>http://www.sourcecodes.ir/<?php echo 'posts.php?cat=2&amp;subject='.$dbsubject['id'].'&amp;title='. str_replace(' ','-', $dbsubject['title']); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
				
					<?php 
					}
					?>



                   <?php 
                $dbsubmenu = mysql_query("select id,title from mtblsubmenu where parentid =4",$dlink); 
       			while($dbsubject = mysql_fetch_assoc($dbsubmenu))
				{
		  
					?>
    <url>
        <loc>http://www.sourcecodes.ir/<?php echo 'posts.php?cat=4&amp;subject='.$dbsubject['id'].'&amp;title='. str_replace(' ','-', $dbsubject['title']); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
				
					<?php 
					}
					?>

	
                          <?php

						$dbresult = mysql_query("
	select id,titr,writedate,writetime,'1' as type_m from mtblpost where  published = 1  
union select id,titr,writedate,writetime,'2' as type_m  from mtbldownload where  published = 1  
union select id,titr,writedate,writetime,'3' as type_m  from mtblmovie where  published = 1 
union select id,titr,writedate,writetime,'4' as type_m  from mtblaudio where  published = 1 
",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{
						$pagego="";$div_view="";
						if($post['type_m']==1)
						  $pagego="post";
						  else if($post['type_m']==2)
						  $pagego="download";
						  else if($post['type_m']==3)
						  $pagego="movie";
						  else if($post['type_m']==4)
						  $pagego="news";
						  
		 				  $div_view="div".$pagego;
						  
				$jalalidate=$post['writedate'];
				$jalal=explode('/',$jalalidate);
				$miladidate=jalali_to_gregorian($jalal[0],$jalal[1],$jalal[2],'-');
				$milad=explode('-',$miladidate);
				if($milad[1]<10)
				  $milad[1]='0'.$milad[1];
				 if($milad[2]<10)
				  $milad[2]='0'.$milad[2];
				  $miladidate= $milad[0].'-'.$milad[1].'-'.$milad[2];
				  
					?>
     <url>
        <loc>http://www.sourcecodes.ir/<?php echo $pagego.'.php?id='.$post['id'].'&amp;title='.str_replace(' ','-', $post['titr']); ?></loc>
        <lastmod><?php echo $miladidate ;?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
				
					<?php 
					}
					?>



</urlset>