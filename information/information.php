<?
	session_start();
?>
<?
	include "../lib/header.php";
?>
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