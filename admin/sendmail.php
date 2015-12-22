<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
// ///////////////////////////////////
$smtp = "smtp.naver.com";
require_once "class.phpmailer.php";
require_once "class.smtp.php";
$mail = new PHPMailer ( true );
$mail->IsSMTP ();
// ///////////////////////////////////
$pass = $_POST ['pass'];
$subject = $_POST ['subject'];
$content = $_POST ['content'];
$id = $_POST ['id'];
require_once "../lib/dbconn.php";

if ($_GET ['email']) {
	try {
		//$mail->SMTPDebug = 1;//오류표시
		$mail->Host = $smtp;
		$mail->Mailer  = "smtp";
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->SMTPSecure = "ssl";
		$mail->CharSet = "utf-8";
		$mail->Username = "goset1264@naver.com";
		$mail->Password = "$pass";
		$mail->SetFrom ( $_GET ['email'] );
		$mail->AddAddress ( $_GET ['email'] );
		$mail->Subject = $subject;
		$mail->MsgHTML ( $content );
		$mail->Send ();
		$mail->ClearAddresses ();
		?>     
		<?
		$content = sha1 ( $content );
		$sql = "update member set pass='$content' where id='$id'";
		$conn->query ( $sql );
		$conn->close ();
		?>
		<script>location.href = "../index.php?";</script>
		<?
	} catch ( phpmailerException $e ) {
		echo $e->errorMessage ();
	} catch ( Exception $e ) {
		echo $e->getMessage ();
	}?>
	<?
} else {
	$sql = "select email from member";
	$result = $conn->query ( $sql );
	$n = 0;
	while ( $row = $result->fetch_assoc () ) {
		echo $n;
		$email = $row ['email'];
		try {
			$mail->Host = $smtp;
			$mail->SMTPAuth = true;
			$mail->Port = 465;
			$mail->SMTPSecure = "ssl";
			$mail->CharSet = "utf-8";
			$mail->Username = "goset1264@naver.com";
			$mail->Password = "$pass";
			$mail->SetFrom ( "goset1264@naver.com" );
			$mail->AddAddress ( "$email" );
			$mail->Subject = $subject;
			$mail->MsgHTML ( $content );
			$mail->Send ();
			$mail->ClearAddresses ();
			?>      
		<?php
		} catch ( phpmailerException $e ) {
			echo $e->errorMessage ();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
		}
		$n ++;
	}
	$conn->close ();
	?>
	<script>alert("이메일을 전송하였습니다."); location.href="../index.php";</script>
	<?php
}
?>
</body>
</html>