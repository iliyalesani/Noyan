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
$postcount=0;
$pn=0;
$showpost=10;

if(isset($_GET['pn']) && is_numeric($_GET['pn']))
$pn=$_GET['pn'];


			$dbresult = mysql_query("
	          select id,titr,image,shorttext,writedate ,writetime from mtblaudio where  published = 1  order by writedate desc,writetime desc 
                limit ".$pn.",".$showpost,$dlink);
			  
			//================================  post count 
				$dbresult_tedad = mysql_query(" select count(*) as tedad from mtblaudio where  published = 1 ",$dlink);
			//================================  post count 

	$tedadpost=mysql_fetch_assoc($dbresult_tedad);
	$postcount=$tedadpost['tedad'];
	

  ?>              
                
				<!-- ENDS title -->
				<h1 class="contenth1"><?php echo $pagetitle;?></h1>
				<!-- Portfolio -->
				<div id="projects-list">
					

<?php
					while($post = mysql_fetch_assoc ($dbresult) )
					{
						$pagego="news";$div_view="";
						  $div_view="div".$pagego;
					?>
                    
					<!-- project -->
					<div class="project">
						<h1 class="<?php echo $div_view;?>"><a href="<?php echo $pagego.'.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']); ?>"><?php echo $post['titr']?></a></h1>
				
						<!-- shadow -->
						<div class="project-shadow">
							<!-- project-thumb -->
							<div class="project-thumbnail">
								
								<!-- meta -->
								<ul class="meta">
									<li><strong> تاریخ ثبت : </strong> <?php echo $post['writedate'];?> </li>       
									<li><strong> توسط : </strong>مدیر</li>
								</ul>
								<!-- ENDS meta -->
								
								<a href="<?php echo $pagego.'.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']); ?>" class="cover"><img src="<?php echo $post['image']?>"  alt="<?php echo $post['titr']?>" /></a>
							</div>
							<!-- ENDS project-thumb -->
							
							<div class="the-excerpt">
								<p><?php echo $post['shorttext']?> </p>
                                
							</div>	
							<a href="<?php echo $pagego.'.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']); ?>" class="read-more">ادامه مطلب</a>
						
						</div>
						<!-- ENDS shadow -->
					</div>
					<!-- ENDS project -->

<?php
}
?>



				</div>
				<!-- ENDS Portfolio -->
				

				<!-- pagination -->	
				<div class="clear"></div>
				<ul class='pager' >
                <?php
				$postcount=ceil($postcount/$showpost);
				for($i=1;$i<=$postcount;$i++)
				{
					$style="";
					if(ceil($pn/$showpost)+1 == $i)
					 $style="style='background-color:#093;'";
			echo "<li><a ".$style." href='viewnews.php?pn=".(($i-1)*$showpost)."&title=".$_GET['title']."' >".$i."</a></li>";
				}
				?>
					
				</ul>
				<!-- ENDS pagination -->

			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>