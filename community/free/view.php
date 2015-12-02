<?
	session_start();

	$num = $_GET[num];
	/*
	$userid = $_SESSION[userid];
    $username = $_SESSION[username];
    $usernick = $_SESSION[usernick];
    $userlevel = $_SESSION[userlevel];
	*/
	$table = "free";
	$page = $_GET[page];

	$writer = $_POST[writer];

	include "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$item_num = $row[num];
  /*$item_id = $row[id];
	$item_name = $row[name];*/
	$item_nick = $row[nick];
	$item_hit = $row[hit];

	$image_name[0] = $row[file_name_0];
	$image_name[1] = $row[file_name_1];
	$image_name[2] = $row[file_name_2];

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

	$item_date = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp", $row[subject]);
	$item_content = $row[content];
	// $is_html = $row[is_html];

  /*if ($is_html!="y") {
		$item_content = str_replace(" ", "&nbsp", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	} */

	for ($i=0; $i < 3; $i++) { 		
		if ($image_copied[$i]) {
			$imageinfo = getimagesize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i] = $imageinfo[2];

			if ($image_width[$i] > 760) {
				$image_width[$i] = 760;
			}
		} else {
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i] = "";
		}
	}

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";  // 조회수 증가
	$conn->query($sql);
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
<link rel="stylesheet" type="text/css" href="../../css/common.css" media="all">
<link rel="stylesheet" type="text/css" href="../../css/freeboard.css" media="all">
<title>커뮤니티 - 자유게시판</title>
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<script>
</script>
</head>


<body>
<!-- start of header -->
<div id="header" class="header">
	<? include "../../lib/header2.php"; ?>
</div><!-- end of Header -->

<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
			<div class="nav">
				<img src="../../img/nav_menu3.png" width="200" height="200" alt="커뮤니티">
			</div>
			<div class="sub_nav">
				<div class="sub_nav1" style="padding: 30px 20px 20px">
					<a href="../free/list.php"><h3>자유 게시판</h3></a>
				</div>
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
					<h3> 자유 게시판 </h3>
				</div>

				<div class="main_co2" style="padding:0px 32px 50px">
					<div class="title">
					<!-- <img src="../img/title_free.gif"> -->
					</div>


				<!-- <div id="view_comment"> &nbsp; </div> -->
					
					<div id="view_title">
						<div class="view_title1"><?= $item_subject ?></div>
						<div class="view_title2"><?= $item_nick ?>&nbsp;&nbsp;|&nbsp;&nbsp;조회수 : <?= $item_hit ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?= $item_date ?></div>
					</div>

				<div id="view_content">
			<?
				for ($i=0; $i < 3; $i++) { 
					if ($image_copied[$i]) {
						$img_name = $image_copied[$i];
						$img_name = "./data/".$img_name;
						$img_width = $image_width[$i];

						echo "<img src='$img_name' width='$img_width'>"."<br><br>";
					}
				}
			?>

						<?= $item_content ?>
				</div>

				<div id="ripple">
			<?
				$sql = "select * from free_ripple where parent='$item_num'";
				$ripple_result = $conn->query($sql);

				while ($row_ripple = ($ripple_result->fetch_assoc())) {
					$ripple_num = $row_ripple[num];
					// $ripple_id = $row_ripple[id];
					$ripple_nick = $row_ripple[nick];
					$ripple_content = str_replace("\n", "<br><br>", $row_ripple[content]);
					$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
					$ripple_date = $row_ripple[regist_day];
			?>
					<div id="ripple_writer_title">
						<ul>
							<li class="writer_title1"><?=$ripple_nick?></li>
							<li class="writer_title2"><?=$ripple_date?></li>
							<li class="writer_title3">
			<?
				if ($userid == "root" || $userid == $rippple_id) {
					echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>";		
				}
			?>
							</li>
						</ul>
					</div><!-- end of #ripple_writer_title -->

					<div id="ripple_content"><?=$ripple_content?></div>
					<div class="hor_line_ripple"></div>
			<?
				}
			?>
					<!-- start of FORM -->
					<form name="ripple_form" method="post" action="insert_ripple.php?table=<?= $table ?>&num=<?=$item_num?>">
					<div id="ripple_box">
						<div class="ripple_box1"><img src="../../img/board/title_comment.gif"></div>
						<div class="ripple_box2"><textarea rows="5" cols="60" name="ripple_content"></textarea></div>
						<div class="ripple_box3"><a href="#"><img src="../../img/board/ok_ripple.gif" onclick="check_input()"></a></div>
					</div><!-- end of #ripple_box -->
					</form>
					<!-- end of FORM -->
				</div><!-- end of ripple -->

				<div id="view_button">
					<a href="list.php?table=<?= $table ?>&page=<?=$page?>"><img src="../../img/board/list.png"></a>&nbsp;
			<?
				// if ($userid && ($userid == $item_id) || $userlevel == 1) {
			?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">
					<img src="../../img/board/modify.png"></a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">
					<img src="../../img/board/delete.png"></a>&nbsp;
			<?
				// }
			?>
			
			<?
				if($userid) {
			?>
				<a href="write_form.php?table=<?= $table ?>"><img src="../../img/board/write.png"></a>
			<?
				}
			?>
				</div><!-- end of #view_button -->

				<div class="clear"></div>

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->


<!-- start of footer-->
<div id="footer" align="center">
<img src="../../img/footercopyrighter.png" alt="푸터">
</div><!-- end of footer -->	
</body>
</html>