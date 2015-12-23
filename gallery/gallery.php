<?
	session_start();
?>
<?
	require_once "../lib/header.php";
?>

<!-- start of container -->
<div id="container" style="background-color:#fff;">
	<div class="wrap">
		<div class="content" id="content">
		<?
			require_once "../lib/gallery_sub_nav.php";
		?>
		<div class="main_content">
			<!-- <div class="main_co1">			
				<h3> 갤러리 </h3>
			</div> -->
	
			<!-- 메인 갤러리 시작 -->
			<div class="main_co2" style="padding:0px 0px;">
	
	<script type="text/javascript">
	var item_width;
	var item_cnt;
	var isSlidding = false;
	var tSlidding = 500;
	var iSlidding = 5000;
	var timerSlider;
	var item_left;
    var pagination = 0;
    var $on_rolling;
    var item_left = 0;
    var side_opacity = "0.3";
	var backcolor = "#000";
    $(document).ready(function(){
        $(".btn_interior_left").click(function(){
            fnMoveSlide("l");
        });
        
        $(".btn_interior_right").click(function(){
            fnMoveSlide("r");
        });

        $on_rolling = $(".content_interior").eq(0);
        fnSetSlider();
        
		$( window ).resize(function() {
			fnSetSlider();
		});

		$( window ).load(function() {
			fnMoveSlide("r");
		});

    });

	function fnSetSlider(){		
        
		clearTimeout(timerSlider);
        
		item_cnt    = $on_rolling.find(".content_interior_rolling li").size();		
		item_width  = $on_rolling.find(".content_interior_rolling li").eq(0).width();		 
        if(!item_cnt) return ;  	  
        var win_width = $on_rolling.width(); 

        item_left = item_width - ((win_width-item_width)/2)

        $on_rolling.find(".content_interior_rolling ul").css({"width":item_width*item_cnt*2, "left":"-"+item_left+"px"});	
        
        for(i=0;i<item_cnt;i++){
            if(i==1) {
				$on_rolling.find(".content_interior_rolling li").eq(i).css({"background":""});
				$on_rolling.find(".content_interior_rolling li p").eq(i).css({"opacity":"1"});
			} else {
				$on_rolling.find(".content_interior_rolling li").eq(i).css({"background":backcolor});
				$on_rolling.find(".content_interior_rolling li p").eq(i).css({"opacity":side_opacity});
			}
        }
        
  	}
    
	function fnMoveSlide(way){

		if(isSlidding) return;

		isSlidding = true; 
        clearTimeout(timerSlider);

		if(way == "l") { 
			$on_rolling.find(".content_interior_rolling li:first-child").before($on_rolling.find(".content_interior_rolling li:last-child").clone());
			$on_rolling.find(".content_interior_rolling li").css({"background":backcolor});
			$on_rolling.find(".content_interior_rolling li p").css({"opacity":side_opacity});
			$on_rolling.find(".content_interior_rolling li").eq(1).css({"background":""});
			$on_rolling.find(".content_interior_rolling li p").eq(1).css({"opacity":"1"}); 
			$on_rolling.find(".content_interior_rolling ul").css({"left":"-"+(item_left+item_width)+"px"});
			$on_rolling.find(".content_interior_rolling ul").animate({left:"+="+item_width}, tSlidding, function(){
				$on_rolling.find(".content_interior_rolling li:last-child").remove();
				$on_rolling.find(".content_interior_rolling ul").css({"left":"-"+item_left+"px"});
				$on_rolling.find(".content_interior_rolling li:eq(2)").css({"background":backcolor})
				$on_rolling.find(".content_interior_rolling li p:eq(2)").css({"opacity":side_opacity})
				isSlidding = false;
				 
				timerSlider = setTimeout(function(){
					fnMoveSlide("r");
				}, iSlidding);


			});

		} else {
			$on_rolling.find(".content_interior_rolling li:last-child").after($on_rolling.find(".content_interior_rolling li:first-child").clone());
			$on_rolling.find(".content_interior_rolling li:eq(2)").css({"background":""});
			$on_rolling.find(".content_interior_rolling li p:eq(2)").css({"opacity":"1"});
			$on_rolling.find(".content_interior_rolling li:eq(1)").css({"background":backcolor});
			$on_rolling.find(".content_interior_rolling li p:eq(1)").css({"opacity":side_opacity});
			$on_rolling.find(".content_interior_rolling ul").animate({left:"-="+item_width},
			 tSlidding, function(){								
				$on_rolling.find(".content_interior_rolling li:first-child").remove();
				$on_rolling.find(".content_interior_rolling ul").css({"left":"-"+item_left+"px"});
				isSlidding = false;				 
				timerSlider = setTimeout(function(){
				fnMoveSlide("r")
			 }, iSlidding);

			});			
		}
	}

	</script>		
			<article id="ctt" class="ctt_05_interior">   
				<div class="content_interior">
				<div class="content_interior_rolling">
				<ul>
     		        <li><p><img src="../img/gallery/asan1.jpg" width="824" height="490"><br></p></li>
					<li><p><img src="../img/gallery/asan2.jpg" width="824" height="490"></p></li>
					<li><p><img src="../img/gallery/asan3.jpg" width="824" height="490"></p></li>
					<li><p><img src="../img/gallery/asan4.jpg" width="824" height="490"></p></li>
					<!-- <li><p><img src="../img/gallery/main_sd3.png" width="824" height="490"></p></li> -->
					<!-- <li><p><img src="../img/gallery/main_sd1.png" width="824" height="490"><br style="clear:both;"><br></p></li> -->
				</ul>
				</div>

				<div class="btn_interior_left"><img src="../img/gallery/btn_prev.png"></div>
				<div class="btn_interior_right"><img src="../img/gallery/btn_next.png"></div>
				</div>	
			</article>
	

	
			</div><!-- end of main_co2 -->
		</div><!-- end of main_content -->
	</div><!-- end of content -->
</div><!-- end of wrap -->
</div><!-- end of container -->

<?
require_once "../lib/footer.php";
?>