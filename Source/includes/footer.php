
<div  style="clear:both;"></div>

		</div>
		<!-- ENDS MAIN -->
			
		
			<!-- FOOTER -->
			<div id="footer">
				
				<!-- footer-cols -->
				<ul id="footer-cols">
					<li class="col">
                    <div class="box-sidebar">
                     <h6 class="news" >آخرین اخبار</h6>
			         <ul>
                     <?php 
					 $dbresult=mysql_query ("select *  from  mtblaudio  WHERE published=1 order by id desc limit 0,6",$dlink);
                     while( $news=mysql_fetch_assoc($dbresult))
					 {
                          echo '<li class="newsli"><a href="news.php?id='.$news['id'].'&title='.str_replace(' ','-', $news['titr']).'">'.$news['titr'].'</a></li>';
					 }
					 ?>
					 </ul>
                   </div>
					</li>
					<li class="col">
                     <div class="box-sidebar">
                      <h6 class="random">املاک تصادفی</h6>
			          <ul>
                     <?php
$dbresult = mysql_query("
 select id,titr,image,shorttext,writedate ,writetime,price  from mtbldownload where  published = 1  
 order by RAND()  limit 6",$dlink);
					while($post = mysql_fetch_assoc ($dbresult) )
					{
						$pagego="";$div_view="";
						  $pagego="download";	  
						  $div_view="div".$pagego;
						echo '<li class="sourcecodeli"><a href="'. $pagego.'.php?id='.$post['id'].'&title='.
						 str_replace(' ','-', $post['titr']).'">'.$post['titr'].'</a></li>';
					}
					?>
					 </ul>
                   </div>
					</li>
                     <?php
$dbresult=mysql_query ("select *  from  sbtblstores  WHERE ID=1",$dlink);
$result=mysql_fetch_assoc($dbresult);
if($result['VisitEnabled']==1)
echo ' 
                   <li class="col">
                    <div class="box-sidebar">              	 
                     <h6 class="bazdid">آمار سایت</h6>
			         <ul>';

$dbresult2=mysql_query ("select *  from  `viewsite`  WHERE ID=0",$dlink);
$result2=mysql_fetch_assoc($dbresult2);
  if($result['VisitEnabled']==1)
  {
	  echo '<li class="bazdidli"> بازدید امروز <span>'.$result2['Day'].'</span></li>';
	  echo '<li  class="bazdidli"> بازدید دیروز  <span>'.$result2['LastDay'].'</span></li>';
	  echo '<li class="bazdidli"> بازدید کل <span>'.$result2['All'].'</span></li>';
	  

	  	  $dbresult2=mysql_query ("select count(*) as tedad  from  `mtbldownload` ",$dlink);
      $result2=mysql_fetch_assoc($dbresult2); 
	  echo '<li class="sourcecodeli">تعداد املاک <span>'.$result2['tedad'].'</span></li>';
	  	  $dbresult2=mysql_query ("select count(*) as tedad  from  `mtblaudio` ",$dlink);
      $result2=mysql_fetch_assoc($dbresult2); 
	  echo '<li class="newsli"> تعداد اخبار <span>'.$result2['tedad'].'</span></li>';

	  
	  echo '		</ul>					 
                   </div>
					</li>
					';
  }
  ?>

                                                      
                    
				</ul>
				<!-- ENDS footer-cols -->
				
				<!-- Bottom -->
				<div id="bottom">

		</div>
				<!-- ENDS Bottom -->
			</div>
			<!-- ENDS FOOTER -->
		
		</div>
		<!-- ENDS WRAPPER -->
	<div id="bottomdiv" >
    	 تمامی حقوق این سایت ، متعلق به وب سایت نویان می باشد.<br>
     
					
				<a href="#"><div id="to-top"  class="poshytip" title="برو بالا"></div>	</a>
	<br/>				
	</div>
    
    
	</body>
	
</html>