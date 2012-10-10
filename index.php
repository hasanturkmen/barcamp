<!DOCTYPE html>
<html lang="en">
<head>
	<title>Barcamp Deland -- Downtown Deland, FL - Technology Conference - Deland, Orange City, Deltona, Sanford - Florida</title>
	<meta name="description" CONTENT="BarCamp Deland is a free conference in Downtown Deland, FL that's centered around technology. Bringing people together from backgrounds like web-design, photography, graphic design web-development and technology for cooperative learning.">
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/head_common.php')?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/navigation.php')?>
<div id="content" class="container-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/header.php')?>
	<div class="row-fluid">
		<div class="span12">
			<div class="hero-unit">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/feature_keyinfo.php')?>
			</div><!-- hero unit -->
		</div>
	</div><!-- row -->
	<div id="info" class="row-fluid">
		<article id="main" class="span6">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/feature_thanks.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/feature_whatis.php')?>
		</article><!-- Main Article -->	
		
		<sidebar id="sidebarone" class="span3">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_keepitgoing.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_sponsors.php')?>
		</sidebar>

		<sidebar id="sidebartwo" class="span3">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_speakers.php')?>
		</sidebar>
	</div><!-- info -->	
</div><!-- content -->	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/footer.php')?>
	<script>
	$(function() {
	
		$.getJSON('/_/data/speakers.json', function(data) {
		    var template = $('#speakerstpl').html();
		    var html = Mustache.to_html(template, data);
		    $('#speakers').html(html);
		    $('#speakers').cycle({
				fx: 'fade',
				pause: 1,
			    random:  1,
				next: '#spkr_next',
				prev: '#spkr_prev',
				speed: 500,
				timeout: 10000
			});
		}); //get json
		
		$.getJSON('/_/data/sponsors.json', function(data) {
		    var template = $('#sponsorsbtpl').html();
		    var html = Mustache.to_html(template, data);
		    $('#sponsorsidebar').html(html);
		    $('#sponsorsidebar').cycle({
				fx: 'scrollLeft',
				pause: 1,
			    random:  1,
				speed: 300,
				timeout: 5000
			});

		    template = $('#sponsorsfttpl').html();
		    html = Mustache.to_html(template, data);
		    $('#sponsorsfooter').html(html);

		}); //get json

		
		sizing();
		$(window).resize(sizing);

		function sizing() {
		  var windowwidth=$(window).width();
		  if(windowwidth>=1200){
		    $('#main').removeClass('span8').addClass('span6');
		    $('#sidebarone').removeClass('span4').addClass('span3');
		    $('#sidebartwo').css('display','inline');
		  } else {
		    $('#main').removeClass('span6').addClass('span8');
		    $('#sidebarone').removeClass('span3').addClass('span4');
		    $('#sidebartwo').css('display','none');
		  }          
		}
	});
	</script>
</body>
</html>








