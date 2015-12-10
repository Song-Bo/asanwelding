 <meta charset="UTF-8">
 <?		
 	$page = $_GET[page];
 	
 	require_once "dbconn.php";

 	$url = "http://$_SERVER[HTTP_HOST]/asan"; 
 	
   	$sql4 ="select * from notice order by num desc";
	$result4 = $conn->query($sql4);
	$total_record4 = mysqli_num_rows($result4);   	
	
   for ($j=0; $j< $total_record4; $j++) {

      mysqli_data_seek($result4, $j);     // 포인터 이동        
      $row2 		= $result4 -> fetch_assoc();  // 하나의 레코드 가져오기	      
	  $item_num2 	= $row2[num];	
	  $item_id2     = $row2[id];
	  $item_name2   = $row2[name];
	  $item_hit2 	= $row2[hit];
      $item_date2   = $row2[regist_day];
      $item_date2   = substr($item_date2, 0, 10);
	  $item_subject2 = str_replace(" ", "&nbsp;", $row2[subject]);
	  	  
?>	  
	  <li class="notice_subject"><a href="<?=$url?>/community/notice/view.php?table=notice&num=<?=$item_num2?>&page=<?=$page?>">
						<em><b>[공지] </b></em><?=$item_subject2?></a>
      </li>		
<?
	}
?>