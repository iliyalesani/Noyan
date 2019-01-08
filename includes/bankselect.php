<?php
		$dlink=mysql_connect("localhost","winsc_admin","winsc_admin");
		mysql_query("SET NAMES 'utf8'"); 
		mysql_query("SET CHARACTER SET utf8");  
		mysql_query("SET SESSION collation_connection = 'utf8_persian_ci'"); 
		mysql_select_db("winscrip_firm",$dlink);
		
		
function clean($str) {
$str = @trim($str);
$str =str_replace("'","",$str);
return $str;
}
?>