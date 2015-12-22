<?
session_start();

$find = $_GET[find];
$submit = $_POST[submit];

?>

<?
	require_once "../lib/header.php";
?>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">			
				<div class="nav">
			<? if($find == 'id') { ?>
					아이디 찾기				
			<? 
				} else {
			?>
					비번 찾기
			<? } ?>
				</div>				
			</div><!-- end of nav_wrap -->

			<div class="main_content">
				<div class="main_co1" padding="40px">

				</div>
				<div class="main_co2" style="margin-top:20px">
					
<!-- 아이디 찾기 시작 -->
<?
if ($find == 'id') {
?>
	<center>
		<h2>아이디 찾기</h2>
		<form action="find_member.php" name="find_id" method="post">
			<table cellpadding="10" cellspacing="10">
				<tr>
					<td>이름</td>
					<td><input type="text" name=name></td>
				</tr>
				<tr>
					<td>이메일</td>
					<td><input type="text" name=email></td>
				</tr>
			</table>
			<input type="submit" value="submit" name="find_id">
		</form>
	</center>
<!-- 아이디 찾기 끝 -->

<!-- 비밀번호 찾기 시작 -->
<?
} else if ($find == 'pw') {
?>
<center>
		<h2>비밀번호 찾기</h2>
		<form action="find_member.php" name="find_pass" method="post">
			<table cellpadding="10" cellspacing="10">
				<tr>
					<td>아이디</td>
					<td><input type="text" name=id></td>
				</tr>
				<tr>
					<td>이메일</td>
					<td><input type="text" name=email></td>
				</tr>
				<tr>
					<td>핸드폰</td>
					<td><input type="text" name=hp></td>
				</tr>
			</table>
			<input type="submit" value="submit" name="find_pass">
		</form>
	</center>	
<?
	}
?>
<!-- 비밀번호 찾기 끝 -->					

				</div><!-- end of main_co2 -->
			</div><!-- end of main_content -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</div><!-- end of container -->

<?
require_once "../lib/footer.php";
?>	
