<?
	session_start();
	$url = "http://$_SERVER[HTTP_HOST]/asan";
	$id = $_SESSION[userid];
?>
<?
	require_once "../lib/header.php";
?>
<!-- start of container -->
<script>
	function check_input() {		
		if (!document.member_form.pw2.value) {
			alert('비밀번호를 입력하세요 !');
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
<?
	require_once "../lib/dbconn.php";

	$sql = "select * from member where id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
				<div class="nav">
					마이페이지
				</div>
				<ul class="sub_nav">
					<li class="sub_item"><a href="<?=$url?>/member/member_form_modify.php" class="sub_item_txt tit0">정보수정</a></li>
					<li class="sub_item"><a href="<?=$url?>/member/member_cancel_form.php" class="sub_item_txt tit1">회원탈퇴</a></li>
				</ul>
			</div><!-- end of nav_wrap -->
			<div class="main_content">
				
				<div class="main_co2" style="margin-top:20px">
					
					<!-- 회원가입 폼 -->
					<div class="single-col"></div>
					<div id="member_auth">
						<div class="wrapper_table">
							<div class="header1">
								&nbsp;&nbsp;정보수정<br>

							</div><!-- end of header1 -->
							<div class="body">
								<form name="member_form" method="POST" action="./modify.php">
									<dl class="form1">
										<dt><label for="id"><font color="red"> * </font> 아이디&nbsp;</label><span id="id_space"></span></dt>
										<dd><b><?=$row[id]?></b> </dd>										
										<dt><label for="login_name"><font color="red"> * </font> 이름 </label></dt>
										<dd><input type="text" class="text" id="name" name="name" value="<?=$row[name]?>"></dd>
										<dt><label for="birth"><font color="red"> * </font> 생년월일 </label></dt>
										<dd><input type="text" class="text" id="birth" name="birth" value="<?=$row[birth]?>" placeholder="ex) 19601230"></dd>
										<dt><label for="phone"><font color="red"> * </font> 전화번호 </label></dt>
										<dd><input type="text" class="text" id="phone" name="phone" value="<?=$row[phone]?>" placeholder="ex) 010-0000-0000"></dd>
										<dt><label for="email">이메일</label></dt>
										<dd><input type="email" class="text" id="email" name="email" value="<?=$row[email]?>" placeholder="ex) asan@asan.kr"></dd>
										<dt><label for="empty">&nbsp;</label></dt>
										<dd><p></p></dd>
										<dt><label for="password2"><font color="red"> * </font>비밀번호 확인 </label><span id="pw_space"></span></dt>
										<dd><input type="password" class="text" id="pw2" name="pw2"></dd>
									</dl>
									<div class="btn">
										<p>
											<input type="button" class="btn_submit" onclick="check_input()" value="수정하기"></input>
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
