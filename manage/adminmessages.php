<?php 
session_start();
  if ($_SESSION['Logedin'] != 1)
		  {?>
            <script language="javascript" type="text/javascript"> 
            window.location = '../login.php?msg= &pagename=manage.php&type=1';
			
            </script>
            <?php			
		  }
include('includes/header.php');?>
<?php
   include('includes/bankselect.php');

	
?>
<div id="templatemo_content">  
  <div id="main_column">
  <div class="mgbox">
    <?php
  	if ( isset( $_GET["msg"] ))
	echo $_GET["msg"].'<br/>';
	else
	{

    if($_GET['type']==1)
     echo'صندوق دریافت';
	 else     if($_GET['type']==2)
     echo'صندوق ارسال';
	}
  ?>

</div><br />
<a class="msglink" href="newmessage.php">ارسال پیام جدید</a>
<a class="msglink" <?php if($_GET['type']==1) echo 'style=" background-color:#c63767"' ?> href="adminmessages.php?type=1">صندوق دریافت</a>
<a class="msglink" <?php if($_GET['type']==2) echo 'style=" background-color:#c63767"' ?> href="adminmessages.php?type=2">صندوق ارسال</a>
<br />
<br />



 <table width="100%" cellspacing="0"  align="center" style="border-radius:10px;overflow:hidden; list-style-position:inside;"   >
  


   <?php
   if($_GET['type']==1)
   {
	          $dbresult = mysql_query("select m.*,u.username as uname from mtblmessage m,mtbluser u where m.Sender=u.id and m.Reciver=0  union
			   select m.*,'مهمان' as uname from mtblmessage m where  m.Reciver=0 and m.Sender=-1 order by  ID desc",$dlink);
			  echo' <tr id="main_column_tr"  > <td>ردیف</td><td>کد</td><td>ارسال کننده</td><td>تیتر</td><td>تاریخ</td><td>ساعت</td><td>حذف</td></tr>';
				$rowstyle=0;
	            $radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{

					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';	
					
				    $readed='';
					if ($post['Readed']=='0')
					$readed=' font-weight:bold';				
					echo('
					<tr id="'.$rs.'">
					<td>'.$radif.'</td>
					  <td>'.$post['ID'].'</td>
					  <td>'.$post['uname'].'</td>
		<td style="font-size: 18px; color:#900; width:200px"><a style="'.$readed.'" href="m_view_message.php?type=1&id='.$post['ID'].'">'.$post['Title'].'</a></td>
					   <td>'.$post['SendDate'].'</td>
						<td>'.$post['SendTime'].'</td>
						 <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back=20&id='.$post['ID'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
   }
   else if($_GET['type']==2)
   {
	          $dbresult = mysql_query("select m.*,u.username as uname from mtblmessage m,mtbluser u where m.Reciver=u.id and m.Sender=0 order by  ID desc ",$dlink);
			   echo' <tr id="main_column_tr"  > <td>ردیف</td><td>کد</td><td>دریافت کننده</td><td>تیتر</td><td>تاریخ</td><td>ساعت</td><td>حذف</td></tr>';
	
				$rowstyle=0;
	            $radif=0;
				while($post = mysql_fetch_assoc ($dbresult) )
				{

					$radif++;
					$rowstyle++;
					if($rowstyle %2==0)
					$rs='main_column_tr2';
					else
					$rs='main_column_tr3';
					
					 $readed='';
					if ($post['Readed']=='0')
					$readed=' font-weight:bold';	
										
					echo('
					<tr id="'.$rs.'">
					<td>'.$radif.'</td>
					  <td>'.$post['ID'].'</td>
					  <td>'.$post['uname'].'</td>
		<td style="font-size: 18px; color:#900; width:200px"><a style="'.$readed.'" href="m_view_message.php?type=2&id='.$post['ID'].'">'.$post['Title'].'</a></td>
					   <td>'.$post['SendDate'].'</td>
						<td>'.$post['SendTime'].'</td>
								 <td  onclick="return confirm_delete2();"><a href="m_delete.php?type_back=21&id='.$post['ID'].'"  style="color:red;"><img src="includes/img/delete.png" title="حذف"/></a></td>
					</tr>');
				}
   }
				?>
 <tr id="footer_column_tr"  > <td></td><td></td><td> </td><td></td><td></td><td>&nbsp;</td></tr>
 
 </table>

 
</div>

	<div class="cleaner"></div>
    
</div> <!-- end of content -->

<?php include('includes/footer.php');?>