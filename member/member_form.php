<?
session_start();
?>
<?
require_once "../lib/header.php";
?>
<!-- start of container -->
<script>
	function check_input() {
		if (!document.member_form.id1.value) {
			window.alert('아이디를 입력하세요 !');
			document.member_form.id1.focus();
			return;
		}
		if (!document.member_form.pw1.value) {
			alert('비밀번호를 입력하세요 !');
			document.member_form.pw1.focus();
			return;
		}
		if (document.member_form.pw1.value != document.member_form.pw2.value) {
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
				<div class="nav_title">
					join
				</div>
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
				
				<div class="main_co2" style="margin-top:20px">
					
					<!-- 회원가입 폼 -->
					<div class="single-col"></div>
					<div id="member_auth">
						<div class="wrapper_table">
							<div class="header1">
								&nbsp;&nbsp;아산용접배관학원은 실명제를 실시 하고 있습니다.<br>

							</div><!-- end of header1 -->
							<div class="body">
								<form name="member_form" method="POST" action="./insert.php">
									<dl class="form1">
										<dt><label for="id"><font color="red"> * </font> 아이디&nbsp;</label><span id="id_space"></span></dt>
										<dd><input type="text" class="text" id="id1" name="id1" onblur="confirm_id()"></dd>
										<dt><label for="password"><font color="red"> * </font> 비밀번호 (6자 이상의 영문, 숫자를 입력하세요.)</label></dt>
										<dd><input type="password" class="text" id="pw1" name="pw1" value=""></dd>
										<dt><label for="password2"><font color="red"> * </font>비밀번호 확인 </label><span id="pw_space"></span></dt>
										<dd><input type="password" class="text" id="pw2" name="pw2" onkeyup="confirm_pass()"></dd>
										<dt><label for="login_name"><font color="red"> * </font> 이름 </label></dt>
										<dd><input type="text" class="text" id="name" name="name" value=""></dd>
										<dt><label for="birth"><font color="red"> * </font> 생년월일 </label></dt>
										<dd><input type="text" class="text" id="birth" name="birth" value="" placeholder="ex) 19601230"></dd>
										<dt><label for="phone"><font color="red"> * </font> 전화번호 </label></dt>
										<dd><input type="text" class="text" id="phone" name="phone" value="" placeholder="ex) 010-0000-0000"></dd>
										<dt><label for="email">이메일</label></dt>
										<dd><input type="email" class="text" id="email" name="email" value="" placeholder="ex) asan@asan.kr"></dd>
										<dt><label for="captcha"><font color="red"> * </font>자동가입방지</label></dt>
										<dd><input type="text" class="text" id="captcha" name="captcha" value="" placeholder="아래 문자를 입력해 주세요."></dd>
									</dl>
									<div class="sin">
										<img src="./captcha.php" alt="captcha" id="reCaptcha">
									</div>
									<div class="btn">
										<p>
											<a href="#"><input type="button" class="btn_submit" onclick="check_input()" value="가입하기"></input></a>
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

		confirm_id = function() {

			var id = $("#id1").val();

			$.ajax({
				url:"./id_ajax.php",
				type:"POST",
				data:{"id":id},
				dataType:"Json",
				error: function(request, status, error) {
					alert(error);
				},
				success: function(res) {
					if(res[0].confirm=="ok") {
						$("#id_space").css("color","blue").html("&nbsp;이용가능 합니다 !");
					} else if(res[0].confirm=="no") {
						$("#id_space").css("color","red").html("&nbsp;이미 등록된 아이디 입니다.");
					}
				}
			});
		}

		confirm_pass = function() {

			var pw = $("#pw1").val();
			var pw2 = $("#pw2").val();			

			$.ajax({
				url:"./pw_ajax.php",
				type:"POST",
				data:{"pw":pw, "pw2":pw2},
				dataType:"Json",
				error: function(request, status, error) {
					alert(error);
				},
				success: function(res) {
					if(res[0].confirm=="ok") {
						$("#pw_space").css("color", "blue").html("&nbsp;비밀번호 일치 !");
					} else if(res[0].confirm=="no") {
						$("#pw_space").css("color","red").html("&nbsp;비밀번호를 확인해 주세요.");
					}
				}
			});
		}
	});
</script>
