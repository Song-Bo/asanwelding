<?
	session_start();
?>
<div id="map" style="width: 650px; height: 450px; margin: 1px; border: 1px solid red"></div>
<script type="text/javascript">

var oCenterPoint = new nhn.api.map.LatLng(36.785947, 126.996590);

nhn.api.map.setDefaultPoint('LatLng');

oMap = new nhn.api.map.Map('map', {
	point : oCenterPoint,         // 중심점 (위,경도)
	zoom : 11,                     // 초기 레벨
	enableWheelZoom : true,       // 휠 여부
	enableDragPan : true,         // 드래그 팬 
	enableDblClickZoom : false,   // 더블클릭 줌
	mapMode : 0,                  // 맵 모드
	activeTrafficMap : false,     // 교통맵 활성화
	activeBicycleMap : false,     // 자전거 맵 활성화
	minMaxLevel : [ 1, 14 ],      // 최소 최대 레벨지정
	size : new nhn.api.map.Size(650, 450),
	// detectCoveredMarker : true
});

var markerCount = 0;

// 컨트롤 설정
var mapZoom = new nhn.api.map.ZoomControl();          // 줌 컨트롤 선언

mapZoom.setPosition({                                 // 줌 컨트롤 위치 지정
	left : 10,
	bottom : 240
});

oMap.addControl(mapZoom);                             // 줌 컨트롤 추가

mapTypeChangeButton = new nhn.api.map.MapTypeBtn();   // 지도 타입 버튼 선언
mapTypeChangeButton.setPosition({                     // 지도 타입 버튼 위치 지정
    top: 10,
	left: 680
});
oMap.addControl(mapTypeChangeButton);                 // 지도 타입 버튼 추가

// 마커 사이즈 이미지
var oSize = new nhn.api.map.Size(28,37);
var oOffset = new nhn.api.map.Size(14,37);
var oIcon = new nhn.api.map.Icon(
	'http://static.naver.com/maps2/icons/pin_spot2.png', oSize, oOffset);

var infoWindow = new nhn.api.map.InfoWindow();        // Info Window 생성
var oLabel = new nhn.api.map.MarkerLabel();           // 마커 라벨 선언

// oLabel.setVisible(true, oMarker);   // 마커 라벨 보이기
// infoWindow.setPoint(oMarker.getPoint());
// infoWindow.setVisible(true);        // infoWindow 표시여부
// infoWindow.setPosition({right : 5, top : 20});

oMap.addOverlay(infoWindow); // 지도에 추가
oMap.addOverlay(oLabel);     // 마커 라벨 지도에 추가. 기본은 라벨이 보이지 않는 상태로 추가됨.


var oPoint = new nhn.api.map.LatLng(36.785947, 126.996590);
oMarker = new nhn.api.map.Marker(oIcon, {title : '아산용접배관학원'});

oMarker.setPoint(oPoint);
oMap.addOverlay(oMarker);


// 지도 위 마우스 설정
oMap.attach('mouseenter', function(oCustomEvent) {
	var oTarget = oCustomEvent.target;
	// 마커위에 마우스 올라가면
	if(oTarget instanceof nhn.api.map.Marker) {
		var oMarker = oTarget;
		oLabel.setVisible(true, oMarker);            // 특정 마커를 지정하여 해당 마커의 Title을 보여준다.
	}
});

oMap.attach('mouseleave', function(oCustomEvent) {
	var oTarget = oCustomEvent.target;
	// 마커위에 마우스 나가면
	if(oTarget instanceof nhn.api.map.Marker) {
		oLabel.setVisible(false);
	}
});

</script>