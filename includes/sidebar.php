            
            <!-- start sidebar -->
			<div id="sidebar">

            <div class="box-sidebar">
            <h6 class="sourcecode">دسته بندی املاک</h6>
            <ul>  
                <?php    
                $dbsubmenu = mysql_query("select id,title from mtblsubmenu where parentid =3 and parent=0",$dlink); 
       			while($dbsubject = mysql_fetch_assoc($dbsubmenu))
				{
					echo '<li class="sourcecodeli"><a href="posts.php?cat=3&subject='.$dbsubject['id'].'&title='.
						 str_replace(' ','-', $dbsubject['title']).'">'.$dbsubject['title'].'</a></li>';
			    }
				?>
 
            </ul>       
            </div>
             <div class="clear"></div>
             <div class="box-sidebar">
            <h6 class="sourcecode">املاک ویژه</h6>
            <ul>  
                <?php    
										$dbresult = mysql_query("
 select id,titr,image,shorttext,writedate ,writetime,'2' as type_m,price  from mtbldownload where  published = 1 and name='vizhe' 
 order by writedate desc ,writetime desc ",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{?>
					<li class="sourcecodeli"><a href="<?php echo 'download.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']); ?>"><?php echo $post['titr']?></a></li>
			       <?php
                   }
				?>
 
            </ul>       
            </div>
             <div class="clear"></div>
                         <div class="box-sidebar">
            <h6 class="sourcecode">املاک پربازدید</h6>
            <ul>  
                <?php    
										$dbresult = mysql_query("
 select id,titr,image,shorttext,writedate ,writetime,'2' as type_m,price  from mtbldownload where  published = 1  
 order by view desc limit 10 ",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{?>
					<li class="sourcecodeli"><a href="<?php echo 'download.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']); ?>"><?php echo $post['titr']?></a></li>
			       <?php
                   }
				?>
 
            </ul>        
            </div>
             <div class="clear"></div>
             
                          <div class="box-sidebar">
            <h6 class="sourcecode">تبلیغات</h6>
                <?php    
										$dbresult = mysql_query("
 select id,titr,image,link  from mtbladvertise where  enabled = 1  
 order by id desc",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{?>
					<a href="<?php echo $post['link'] ?>"><img src="<?php echo $post['image']?>" alt="<?php echo $post['titr']?>" width="100%" 
                     style="border-radius:15px;margin-bottom:5px;"/></a>
			       <?php
                   }
				?>

            </div>
             <div class="clear"></div>
          
          </div>
           <!-- ends sidebar -->
