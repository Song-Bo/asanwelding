<meta charset="UTF-8">
<?
	session_start();
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	unset($_SESSION['usernick']);

	echo "<script>
	  		alert('로그아웃 되었습니다.');
	  		location.href='../introduce/introduce.php';
	  	  </script>";
?>