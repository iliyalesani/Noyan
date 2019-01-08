<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
    
        <ul class="footer_menu">
         <li class="first"><a href="manage.php?type=0">مدیریت</a></li>
            <li><a target="_blank" href="../index.php">نمایش سایت</a></li>
         <li><a  href="../logout.php">خروج</a></li>
        </ul>
<br />

<span style="color:#FFF">
<?php
$dbresult=mysql_query ("select *  from  `viewsite`  WHERE ID=0",$dlink);
$result=mysql_fetch_assoc($dbresult);
echo 'امروز: '.$result['Day'].'&nbsp;&nbsp;&nbsp;&nbsp;   دیروز: '.$result['LastDay'].'&nbsp;&nbsp;&nbsp;&nbsp;  کل: '.$result['All'];
?>


</span>
	<!-- end of footer -->
    
</div> <!-- end of footer wrapper -->
    
    </body>
</html>