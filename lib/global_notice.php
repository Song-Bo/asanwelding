 <meta charset="UTF-8">
 <?		
 	require_once "dbconn.php";

 	$url = "http://$_SERVER[HTTP_HOST]/asan"; 
 	$table = "notice";
 	$page = $_GET[page];

 	$sql_count = "select count(*) from $table";
 	$item_count = $conn->query($sql_count);
   	
   	$sql1 ="select * from $table";
	$result1 = $conn->query($sql1);
	$total_record1 = mysqli_num_rows($result1);
   
   	

   	

   for ($j=0; $j< $total_record1; $j++)                    
   {
      mysqli_data_seek($result1, $j);     // 포인터 이동        
      $row1 		= $result1 -> fetch_assoc();  // 하나의 레코드 가져오기	      
	  $item_num1 	= $row1[num];	
	  $item_id1     = $row1[id];
	  $item_name1   = $row1[name];
	  $item_hit1 	= $row1[hit];
      $item_date1   = $row1[regist_day];
      $item_date1   = substr($item_date1, 0, 10);
	  $item_subject1 = str_replace(" ", "&nbsp;", $row1[subject]);
	  


	  $sql2 = "select * from notice_ripple where parent=$item_num1";
	  
	  $result3 =  $conn->query($sql2);

	  $num_ripple2 = mysqli_num_rows($result3);
?>
<?
	}
?>