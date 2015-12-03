<?
	session_start();
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
<link rel="stylesheet" type="text/css" href="../css/common.css">
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<title>수강안내</title>
<script>	
function change() {
	var c = document.getElementById("class").value;
	if (c == 1)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_1.gif' alt='용접기능사'>";
	if (c == 2)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_2.gif' alt='특수용접기능사'>";
	if (c == 3)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_3.gif' alt='가스기능사'>";
	if (c == 4)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_4.gif' alt='배관기능사'>";
	if (c == 5)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_5.gif' alt='에너지관리기능사'>";
	if (c == 6)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_6.gif' alt='온수온돌기능사'>";
	if (c == 7)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_7.gif' alt='공조냉동기계기능사'>";
	if (c == 8)
		document.getElementById("info").innerHTML ="<img src='../img/information/info_8.jpg' alt='산업현장속성과정'>";
}
</script>
</head>
<body>

<!-- start of header -->
<div id="header" class="header">
	<? include "../lib/header.php"; ?>	
</div><!-- end of Header -->


<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				<img src="../img/nav_menu2.png" width="200" height="200" alt="수강안내">
			</div>
			<div class="sub_nav">
				<!-- <div class="sub_nav1">
					<a href="#"><img src="../img/sub_nav_1.png" width="200" height="66"></a>
				</div>
				<div class="sub_nav2">
					<img src="../img/sub_nav_2.png" width="200" height="56">
				</div> -->
			</div>
			</div>
			<div class="main_content">
				<div class="main_co1">			
					<form action="#">		
					<select name="class" id="class" onclick="change()">
						<option value="1" selected="selected">용접기능사</option>
						<option value="2">특수용접기능사</option>
						<option value="3">가스기능사</option>
						<option value="4">배관기능사</option>
						<option value="5">에너지관리기능사</option>
						<option value="6">온수온돌기능사</option>
						<option value="7">공조냉동기계기능사</option>
						<option value="8">산업현장속성과정</option>
					</select>
					</form>
				</div>
				<div class="main_co2">
					<div id="info"><img src="../img/information/info_1.gif" alt="용접기능사"></div> 
				</div>
			</div>
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	include "../lib/footer.php";
?>