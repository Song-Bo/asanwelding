<?
	session_start();
?>
<?
	require_once "../lib/header.php";
?>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
				<div class="nav">학원소개
				<div class="nav_title">
					introduce
				</div>
				</div>
				
					<ul class="sub_nav">
						<li class="sub_item"><a href="introduce.php" class="sub_item_txt tit1">인사말</a></li>
						<li class="sub_item"><a href="routine.php" class="sub_item_txt tit2">오시는 길</a></li>
					</ul>			
			</div>
			<div class="main_content">
				<div class="main_co1" style="padding: 0px 0px 20px 0px">
					<? include "./wheelslide.html"; ?>
					<!-- <img src="../img/introduce/centerimg3.png" alt="용접즁"> -->
				</div>
				<div class="main_co2">
					<pre>
아산 용접배관학원 홈페이지방문을 진심으로 환영합니다.

본원은 자격증 위주의 용접과 배관 관련 실기를 기초부터 쉽게 체계적으로 교육하고 있습니다.
					
교육생이 쉽게 기능을 습득하도록 시설과 장비를 갖추고 있으며, 
					
교육과정은 용접, 특수용접, 가스, 배관, 에너지관리, 온수 온돌, 공조냉동기계과정으로
					
오전, 오후, 야간반, 주말반으로 운영하고 있습니다.
					
교육생 여러분의 기능습득과 자격증 취득으로 성취감과 가치를 높여 드릴 것이며,
					
현장 실무와 경험을 통한 용접과 배관 기능에 대한 모든 것을 전수할 수 있도록 최선을 다하겠습니다.
					
감사합니다.
					
							아산 용접배관학원 임직원 일동 올림.
					</pre>
				</div>
			</div>
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
	require_once "../lib/footer.php";
?>