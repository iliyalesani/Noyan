<?php
 function refresh_visit($StoreID , $dlink)
	{
$dbresult=mysql_query ("select *  from  `viewsite` 	 WHERE `StoreID` =".$StoreID,$dlink);
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
}


$sql="UPDATE `viewsite` SET  
		 `All` = ".$All." ,
		 `Day` = ".$Day." ,
		 `LastDay` = ".$LastDay.",
		 `LastDate` = '".$LastDate."' ,
		 WHERE `StoreID` =".$StoreID;
		 
		 mysql_query ($sql,$dlink);	 
	 
 	
	}
	
?>