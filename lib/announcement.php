 <meta charset="UTF-8">
 <?		
  	$url = "http://$_SERVER[HTTP_HOST]/asan"; 
 	  $table = "notice";
 	  $page = $_GET[page];

   	$sql1 ="select * from $table order by num desc";
	  $result1 = $conn->query($sql1);
	  $total_record1 = mysqli_num_rows($result1);

    if($total_record1 >= 5) $total_record1 = 5;

    for ($j=0; $j< $total_record1; $j++) {
       mysqli_data_seek($result1, $j);                  // 포인터 이동        
       $row1 		       = $result1 -> fetch_assoc();     // 하나의 레코드 가져오기	      
	     $item_num1      = $row1[num];	
	     $item_id1       = $row1[id];
	     $item_name1     = $row1[name];
	     $item_hit1 	   = $row1[hit];
       $item_date1     = $row1[regist_day];
       $item_date1     = substr($item_date1, 0, 10);
	     $item_subject1  = str_replace(" ", "&nbsp;", $row1[subject]);
	  
	     $sql2 = "select * from notice_ripple where parent=$item_num1";
	  
	     $result3 =  $conn->query($sql2);

	     $num_ripple2 = mysqli_num_rows($result3);
?>
	  <div class="list_notice">
        <div class="list_item1"><h4 style="color:#fa2828">공지</h4></div>
        <div class="list_item2"><a href="<?=$url?>/community/notice/view.php?table=<?=$table?>&num=<?=$item_num1?>&page=<?=$page?>">
      						  <?=$item_subject1?></a></div>
        <div class="list_item3"><?= $item_name1 ?></div>
        <div class="list_item4"><?= $item_date1 ?></div>
        <div class="list_item5"><?= $item_hit1 ?></div>
      </div>
<?

   }
?>