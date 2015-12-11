<?
	session_start();
?>
<?
	require_once "../lib/header.php";
?>
<!-- start of container -->
<script>
	function check_input() {
		if (!document.member_form.id.value) {
			window.alert('아이디를 입력하세요 !');
			document.member_form.id.focus();
			return;
		}
		if (!document.member_form.pw.value) {
			alert('비밀번호를 입력하세요 !');
			document.member_form.pw.focus();
			return;
		}
		if (document.member_form.pw.value != document.member_form.pw2.value) {
			alert('비밀번호가 다릅니다 !');
			document.member_form.pw2.focus();
			return;
		}
		if (!document.member_form.name.value) {
			alert('이름을 입력하세요 !');
			document.member_form.name.focus();
			return;
		}
		if (!document.member_form.birth.value) {
			alert('생년월일을 입력하세요 !');
			document.member_form.birth.focus();
			return;
		}
		if (!document.member_form.phone.value) {
			alert('전화번호를 입력하세요 !');
			document.member_form.phone.focus();
			return;
		}		
		document.member_form.submit();
	}		
</script>
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
				<div class="nav">
					회원가입
				</div>
				<ul class="sub_nav">
					<!-- <li class="sub_item"><a href="<?=$url?>/community/notice/list.php" class="sub_item_txt tit0">공지사항</a></li>
					<li class="sub_item"><a href="<?=$url?>/community/free/list.php" class="sub_item_txt tit1">자유게시판</a></li>
					<li class="sub_item"><a href="<?=$url?>/community/job/list.php" class="sub_item_txt tit2">취업소식</a></li>
					<li class="sub_item"><a href="<?=$url?>/community/download/list.php" class="sub_item_txt tit3">자료실</a></li>
					<li class="sub_item"><a href="<?=$url?>/community/qna/list.php" class="sub_item_txt tit4">Q & A</a></li> -->
				</ul>
			</div><!-- end of nav_wrap -->
			<div class="main_content">
				<div class="main_co1">
					<!-- <h3>회원가입</h3> -->
					<span id="tn">fd</span> 
				</div>
				<div class="main_co2">
					
					<!-- 회원가입 폼 -->
					<div class="single-col"></div>
					<div id="member_auth">
						<div class="wrapper_table">
							<div class="header1">
								&nbsp;&nbsp;<strong>아산용접배관학원은 실명제를 실시 하고 있습니다.</strong><br>
								 
							</div><!-- end of header1 -->
							<div class="body">
								<form name="member_form" method="POST" action="insert.php">
									<dl class="form1">
										<dt><label for="id">* 아이디  (4~12자의 영문 소문자를 입력하세요.)</label></dt>
										<dd><input type="text" class="text" id="id" name="id"></dd>
										<dt><label for="password">* 비밀번호 (6자 이상의 영문, 숫자를 입력하세요.)</label></dt>
										<dd><input type="password" class="text" id="pw" name="pw" value=""></dd>
										<dt><label for="password2">비밀번호 확인 </label></dt>
										<dd><input type="password" class="text" id="pw2" name="pw2" onkeyup="test();"></dd>
										<dt><label for="login_name">* 이름 </label></dt>
										<dd><input type="text" class="text" id="name" name="name" value=""></dd>
										<dt><label for="birth">* 생년월일 </label></dt>
										<dd><input type="text" class="text" id="birth" name="birth" value="" placeholder="ex) 19601230"></dd>
										<dt><label for="phone">* 전화번호 </label></dt>
										<dd><input type="text" class="text" id="phone" name="phone" value="" placeholder="ex) 010-0000-0000"></dd>
										<dt><label for="email">이메일</label></dt>
										<dd><input type="email" class="text" id="email" name="email" value="" placeholder="ex) asan@asan.kr"></dd>
										<dt><label for="captcha">자동가입방지</label></dt>
										<dd><input type="text" class="text" id="captcha" name="captcha" value="" placeholder="아래 문자를 입력해 주세요."></dd>
									</dl>
									<div class="sin">
									<img src="./captcha.php" alt="captcha" id="reCaptcha">
									</div>
									<div class="btn">
										<p>
											<button type="submit" class="btn_submit" onclick="check_input()">가입하기</button>
										</p>
									</div>
								</form>
							</div>
						</div>
					</div><!-- 회원가입 폼 끝 -->

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
require_once "../lib/footer.php";
?>

<script>
	$(document).ready(function() {

		test = function() {
		
		var pw = $("#pw").val();
		var pw2 = $("#pw2").val();			

		$.ajax({
			url:"./member_ajax.php",
			type:"POST",
			data:{"pw":pw, "pw2":pw2},
			dataType:"Json",
			error: function(request, status, error) {
				// alert("code : "+request.status+"\r\nmessage : "+status+"\r\nmessageText : "+request.responseText);
			},
			success: function(res) {
				if(res[0].confirm=="ok") {
					$("#tn").html("비밀번호 일치 !");
					
				} else {
					$("#tn").html("비밀번호 불일치");
					 					
				}
			}
		});
		}
	});
</script>