<?php
	include("_/components/mobile-header.php");
	if ($_GET['v']):
		$venuesquery = " WHERE venues.id = " . $_GET['v'];
	else:
		$venuesquery = "";
	endif;
?>
	<!-- Page: home -->
	<div id="home" data-role="page" data-title="Schedule">
		<?php include("_/components/header-default.php"); ?>
		<div data-role="content">
			<div id="mymap"></div>
		</div><!-- content -->
<?php include("_/components/footer-default.php"); ?>
	</div><!-- page -->
<style>
	#mymap { 
		width:100%;
		height: 800px; 
	}
</style>
<script type="text/javascript">
mapWidth=screen.width;
mapHeight=screen.height;

if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(showLocation,maperror,{timeout:5000});
}
  function convertAddress(address) {
	var geocoder;
	geocoder = new google.maps.Geocoder();
	geocoder.geocode( { 'address': address}, function(results, status) {
		return results[0].geometry.location;
		console.log(results[0].geometry.location);
	});
}

function showLocation (position) {
	var latlng=new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	var myOptions={
		zoom: 19,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("mymap"),myOptions);

	var marker = new google.maps.Marker({
		position: latlng, 
		map: map, 
	});

	var marker = new google.maps.Marker({
		position: convertAddress('112 West Georgia Avenue Deland FL'), 
		map: map, 
	});

}

function maperror(whicherror) {
	var mymap=document.getElementById("mymap");
	if (whicherror.code==1) { mymap.innerHTML="Permission Denied";}
	if (whicherror.code==2) { mymap.innerHTML="Network or Satellites Down"; }
	if (whicherror.code==3) { mymap.innerHTML="GeoLocation timed out"; }
	if (whicherror.code==0) { mymap.innerHTML="Other Error"; }
}
</script>
<?php include("_/components/mobile-footer.php"); ?>