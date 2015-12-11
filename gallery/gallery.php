<?
session_start();
?>
<?
require_once "../lib/header.php";
?>
<script>	

</script>
<!-- start of container -->
<div id="container">
	<div class="wrap">
		<div class="content" id="content">
			<div class="nav_wrap">
				<div class="nav">
					갤러리
				<div class="nav_title">
					gallery
				</div>
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
				<h3> 갤러리 </h3>
			</div>

			<div class="main_co2">
			허허허<br>
			
			<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
			<script language="javascript">
					function layer_popup(type) {
						if(type=="open") {
							document.getElementById('layer_popup1').style.display = "";
						} else {
							document.getElementById('layer_popup1').style.display = "none";
						}
					}



			</script>
			허허허		
			<br><br><hr>
<dl>
<dt><label for="패스워드1"></label></dt>
<dd><input type="password" id="n" name="n"></dd>
<dt><label for="패스워드2"></label></dt>
<dd><input type="password" id="m" name="m" onkeyup="test();"></dd><br>
<span id="tn"></span>
<script>
			$(document).ready(function(){
			
			test = function(){
		
			var tt = $("#n").val();
			var ee = $("#m").val();			
		
			$.ajax({
				url:"./ajax.php",
				type:"POST",
				data:{"tt":tt, "ee":ee},
				dataType:"Json",	
				error: function(request,status,error){
				//alert("code : "+request.status+"\r\nmessage : "+status+"\r\nmessageText : "+request.responseText);
				},
				success: function(res){
				//alert(res[0].okk+" / 이유 : "+res[0].sujung);

				if(res[0].okk=="ok"){
					$("#tn").html("비번 맞다 로그인 시키주라");
					//여기서 서브밋 해주면 된다
				}else if(res[0].okk=="no"){
					$("#tn").html("비번을 확인해주세요");
				}
				
			}
		});
	}
});
</script>
<br><br><hr>
			



			</div>
		</div>
	</div><!-- end of content -->
</div><!-- end of wrap -->
</div><!-- end of container -->

<?
require_once "../lib/footer.php";
?>