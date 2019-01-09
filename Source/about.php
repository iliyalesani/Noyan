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
				<h1 class="contenth1">درباره ما</h1>
				<!-- Portfolio -->
<?php     
      $dbresult = mysql_query("select AboutUs from sbtblstores",$dlink);
	  $post = mysql_fetch_assoc($dbresult);
	  echo $post['AboutUs'];
?>


			</div>
			<!-- ENDS content -->
            
            <!-- start sidebar -->
<?php include('includes/sidebar.php'); ?>

			
		
			<!-- FOOTER -->
	<?php include('includes/footer.php'); ?>