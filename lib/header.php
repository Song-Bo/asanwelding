<?
	session_start();
	$url = "http://$_SERVER[HTTP_HOST]/asan"; 
	$userid = $_SESSION[userid];
	$username = $_SESSION[username];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--[if IEMobile 7]><html class="iem7"  lang="en" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="en" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="en" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/freeboard.css">
<link rel="stylesheet" type="text/css" href="<?=$url?>/css/layout.css">
<title>아산용접배관학원</title>
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?=$url?>/js/phoschool/jquery-scrollnews.js"></script>
<script type="text/javascript" src="<?=$url?>/js/phoschool/jquery-blink.js"></script>
<script type="text/javascript" src="<?=$url?>/js/jquery.leanModal.min.js"></script>
<script>
$(document).ready(function(){
	// 공지사항 롤링
	$("#roll").Scroll({
		line:1,
		speed:500,
		timer:3000
	});
});
</script>
</head>
<body>

<!-- start of header -->
<div id="header" class="header">
	<!-- header of global -->
	<div class="global">
		<div id="top" class="above">
		<div class="notice">		
		
			<div class="global_notice fl">
				<div class="notice_title fl"><a href="<?=$url?>/admin/notice/list.php"><b>[공지사항]</b></a></div>
				
				<div class="notice_top3" id="roll" style="overflow:hidden;">
					<ul>
						<li class="notice_subject"><a href="<?=$url?>/community/free/view.php?table=free&num=17&page=1">
						욤마 하~~~~~~~~~ 브레이꺼~~~~~                        </a>
						</li>
						<li class="notice_subject"><a href="/gnuboard4/bbs/board.php?bo_table=notice&wr_id=9155">
						죽지 못해 사는 한석주와 잠자기 위해 사는 김홍만</a>
						</li>
						<li class="notice_subject"><a href="/gnuboard4/bbs/board.php?bo_table=notice&wr_id=9115">
						 Oh Captain ~ my captain ~  </a>
						</li>
					</ul>
				</div>
			</div>
			
		</div><!-- end of notice -->
		<ul class="util">
		<?
			$userid = $_SESSION['userid'];
			if (!$userid) {
		?>
			<li><a href="#loginmodal" class="flatbtn" id="modaltrigger">로그인</a></li>
			<li><a href="">회원가입</a></li>
		<?
			} else if ($userid == "admin") {
		?>
			<li><?=$username?> 님 반갑습니다.</li>
			<li><a href="<?=$url?>/admin/administration.php">관리자 모드</a></li>
			<li><a href="<?=$url?>/login/logout.php">로그아웃</a></li>
		<?
			}
		?>
		</ul>		
		</div>
	</div><!-- end of global -->

	<!-- header of center -->
	<div class="center">
		<div class="logo">
			<a href="<?=$url?>/index.php" class="logo_txt">아산용접배관학원</a>
		</div>
		<div class="menu">
			<ul>
				<li class="menu1">
					<div class="menu1">
						<a href="<?=$url?>/introduce/introduce.php" class="menu">학원소개</a>
					</div>
				</li>
				<li class="menu2">
					<div class="menu2">
						<a href="<?=$url?>/information/information.php" class="menu">수강안내</a>
					</div>
				</li>
				<li class="menu3">
					<div class="menu3">
					<a href="<?=$url?>/community/community.php" class="menu">커뮤니티</a>
					</div>
				</li>
				<li class="menu4">
					<div class="menu4">
						<a href="<?=$url?>/gallery/gallery.php" class="menu">갤러리</a>
					</div>
				</li>
			</ul>
		</div><!-- end of menu -->
	</div><!-- end of center -->
</div><!-- end of Header -->


<!-- start of Modal Login Part -->
<div id="loginmodal" style="display:none;">
	<h2>아산용접배관학원</h2>
	<div class="p_c_text">회원이 되시면 여러 혜택을 누리실 수 있습니다.</div>

	<!-- start of form -->
	<form method="POST" action="../login/login.php">
	<div class="login_line">
		<div class="box_in1">
			 <input type="text" name="id" id="id" placeholder="아이디" size="30">
			 <input type="password" name="pw" id="pw" placeholder="비밀번호" size="30">
		</div>		
	</div>
	<div class="box_in2"><input type="submit" title="로그인" alt="로그인" value="로그인" class="lgn" /></div>
	<div class="find_join"><a href="">아이디 / 비밀번호 찾기</a> &nbsp;|&nbsp; <a href="">회원가입</a></div>
	</form>
	<!-- end of form -->

</div>




<!-- Modal Window Part -->
<script type="text/javascript">
$(function(){

  $("#dsaform").submit(function(e){	

	if (!$('#id').val()) {
		alert('아이디를 입력하세요.');
		$('#id').val();
		$('#id').focus();
			
	}

	else if (!$('#pw').val()) {
		alert('비밀번호를 입력하세요.');
		$('#pw').val();
		$('#pw').focus();		
	}

	<? require_once "../lib/dbconn.php"; ?>

	<?
		$id = $_POST[id];
		echo "alert($id);
				";
		$pw = $_POST[pw];
		$sql = "select * from member where id='$id'";
		$result = $conn->query($sql);
		// $num_match = $result->fetch_assoc();
		$num_match = mysqli_num_rows($result);

		
		
	?>
  	 return false;    
  });
  
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.8, closeButton: ".hidemodal" });
});

</script>


<!-- end of Modal Login Part -->
