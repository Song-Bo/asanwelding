<?
	session_start();

	$num = $_GET[num];
	$ripple_content = $_POST[ripple_content];

  /*$userid = $_SESSION[userid];
   	$username = $_SESSION[username];
   	$usernick = $_SESSION[usernick];
   	$userlevel = $_SESSION[userlevel];

   	if(!$userid) {
    	 echo("
	   		<script>
	    	 window.alert('로그인 후 이용하세요.')
	    	 history.go(-1)
	   		</script>
	 		");
	 exit;
   	} */   

   	include "../../lib/dbconn.php";

   	$regist_day = date("Y-m-d (H:i)");

   	$sql = "insert into free_ripple (parent, nick, content, regist_day) ";
   	$sql.= "values ($num, '$nick', '$ripple_content', '$regist_day')";

   	$conn->query($sql);
   	$conn->close();

   	echo "
		<script>
			location.href ='view.php?table=$table&num=$num';
		</script>
   	";
?>