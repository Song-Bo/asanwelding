<?
	session_start();
?>
<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"  lang="en" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="en" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="en" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!-->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/common.css">
	<title>오시는 길</title>
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<!-- Naver MAP API start -->
<script type="text/javascript">
try {
	document.execCommand('BackgroundImageCache', false, true);
} catch(e) {}
</script>
<script type="text/javascript" 
	src="http://openapi.map.naver.com/openapi/naverMap.naver?ver=2.0&key=0139a2ddedc8f337ca3d736be8b3f86d">
</script>
</head>
<body>
  
<!-- start of header -->
<div id="header" class="header">
	<? include "../lib/header1.php"; ?>	
</div><!-- end of Header -->


<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				<img src="../img/nav_menu1.png" width="200" height="200" alt="학원소개">
			</div>
			<div class="sub_nav">
				<div class="sub_nav1">
					<a href="../introduce/introduce.php"><img src="../img/menu1_sub_nav_1.png" width="200" height="66" alt="인사말"></a>
				</div>
				<div class="sub_nav2">
					<a href="#"><img src="../img/menu1_sub_nav_2.png" width="200" height="56" alt="오시는 길"></a>
				</div>
			</div>
			</div>
			<div class="main_content">
				<div class="main_co1">
					<? include "map.php"; ?>
				</div>
				<div class="main_co2">
					
				    <pre>

					주소 : 충청남도 아산시 온천동 260-155
					 TEL : 041 - 541 - 8252
					</pre> 
				</div>
			</div>
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->


<!-- start of footer-->
<div id="footer" align="center">
<img src="../img/footercopyrighter.png" alt="푸터">
</div><!-- end of footer -->	
</body>
</html>
