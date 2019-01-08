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
				<!-- ENDS title -->
				<h1 class="contenth1">آخرین املاک</h1>
				<!-- Portfolio -->
				<div id="projects-list">
					
                          <?php
						$dbresult = mysql_query("
 select id,titr,image,shorttext,writedate ,writetime,'2' as type_m,price  from mtbldownload where  published = 1  
 order by writedate desc ,writetime desc  limit 12",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{
						$pagego="";$div_view="";
						   if($post['type_m']==2)
						  $pagego="download";
						  
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
                                  <?php if($post['type_m']==2){ ?>
                                    <li><strong> قیمت : </strong><b style="color:#FC0"> <?php
									if ($post['price']>0) echo $post['price'].' تومان';
									else  echo 'رایگان'; ?> </b></li>
                                    <?php  }?>
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
						 str_replace(' ','-', $post['titr']); ?>" class="read-more">جزئیات</a>
						
						</div>
						<!-- ENDS shadow -->
					</div>
					<!-- ENDS project -->

<?php
}
?>



				</div>
				<!-- ENDS Portfolio -->
				<div class="clear"></div>

				<!-- pagination -->	

				<!-- ENDS pagination -->

			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>