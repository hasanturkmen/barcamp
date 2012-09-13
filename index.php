<!DOCTYPE html>
<html lang="en">
<head>
	<title>Barcamp Deland -- October 6, 2012 in Downtown Deland, FL - Technology Conference - Deland, Orange City, Deltona, Sanford - Florida</title>
	<meta name="description" CONTENT="BarCamp Deland is conference in Downtown Deland, FL on Saturday, October 6, 2012 that's centered around technology. Bringing people together from backgrounds like web-design, photography, graphic design web-development and technology for cooperative learning.">
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/head_common.php')?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/navigation.php')?>
<div id="content" class="container-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/header.php')?>
	<div class="row-fluid">
		<div class="span12">
			<div class="hero-unit">
				<h1>Free Technology Unconference</h1>
				<p>Downtown Deland<span class="hidden-phone"> • </span><br class="visible-phone" />Saturday, October 6th<span class="hidden-phone"> • </span><br class="visible-phone" />9:00 am - 5 pm</p>
				<p><a class="btn btn-warning btn-large" href="register.php">Register now</a></p>
			</div>
		</div>
	</div><!-- row -->
	<div id="info" class="row-fluid">
		<article id="primary" class="span9">
			<div id="main">
			<h2>What is BarCamp Deland?</h2>
			<p >
			<iframe id="countdown" class="hidden-phone" src="http://www.eventbrite.com/countdown-widget?eid=3917360932" frameborder="0" height="250" width="200" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>
			BarCamp Deland is an ad-hoc unconference event centered around technology. It aims to bring people together from different backgrounds like web-design, photography, graphic design, art, music, web-development and technology for cooperative learning. <span class="hidden-phone">It's an intense event with discussions, demos and interaction from attendees. Anyone with something to contribute or with the desire to learn is welcome and invited to join. When you come, be prepared to share.</span></p>
	
			<h2>Participants wanted!</h2>
			<p>Attendees are encouraged to give a demo, a session, or help with one, or otherwise volunteer/contribute in some way to support the event. All presentations are scheduled the day they happen. Prepare in advance, but come early to get a slot on the wall. The people present at the event will select the demos or presentations they want to see. <span class="hidden-phone">Presenters are responsible for making sure that notes/slides/audio/video of their presentations are published on the web for the benefit of all and those who can’t be present.</span></p>

			<h2>Who should come?</h2>
			<ul>
				<li>Anybody interested in technology and the creative industry</li>
				<li>Programmers, Designers, Photographers, Artists, Marketers, Entrepreneurs, Writers</li>
				<li>If you're interested in meeting and making a connection with others in the local tech industry.</li>
				<li>If you have something to teach or learn from others related to technology.</li>
			</ul>

			<h2>Rules of BarCamp Deland</h2>
			<ol>
				<li>If you plan to attend, you're encouraged to give a demo, a session, or help with one, or otherwise volunteer/contribute in some way to support the event</li>
				<li>Everyone attending is reponsible for helping to promote the event, so go ahead and <a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fbarcampdeland.org%2F&region=follow_link&screen_name=BarCampDeland">follow us on twitter</a>, use the hashtag <span class="label">#barcampdeland</span>, <a href="http://facebook.com/barcampdeland">like our facebook page</a>, blog and share it with the world.</li>
				<li>If you want to present, you must write your topic and name in a presentation slot.</li>
				<li>As many presentations at a time as facilities allow for.</li>
				<li>No pre-scheduled presentations</li>
				<li>Presentations will go on as long as they have to or until they run into another presentation slot. </li>
			</ol>

			<h2>Help us promote</h2>
			<p><span class="hide-phone hide-tablet">Help us promote our event by using one of the logos below!</span> Spread the word with a mention on Twitter or any other social network.</p>
			<p>
			<a class="btn btn-warning" data-toggle="modal" href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fbarcampdeland.org%2F&region=follow_link&screen_name=BarCampDeland"><i class="icon-large icon-twitter"></i> Follow us on Twitter</a>
			<a class="btn btn-warning" data-toggle="modal" href="http://facebook.com/barcampdeland"><i class="icon-large icon-facebook"></i> Like us on Facebook</a>
			<a href="/images/barcampdeland.pdf" class="btn btn-warning visible-desktop"><i class="icon-large icon-download"></i> PDF Logo</a>
			<a class="btn btn-warning visible-desktop" data-toggle="modal" href="/images/barcampqrcode.pdf"><i class="icon-large icon-qrcode"></i> QR Code PDF</a>
			</p>
			
			<p id="sharelogos" class="visible-desktop">
				<img src="/images/barcampdeland-horiz-share.png" alt="BarCamp Horizontal Logo Code" />
				<img src="/images/barcampdelandlogo-square-share.png" alt="BarCamp Horizontal Logo Code" />
				<img src="images/barcampqrcode.png" alt="BarCamp QR Code" />
			</p>
			</div>

			<sidebar id="middle" class="hidden-phone">
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_helpsponsor.php')?>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_speakers.php')?>
			</sidebar>
		</article><!-- Main Article -->	
			
		
		<sidebar id="secondary" class="span3">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_schedule.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_twitter.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_venue.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_parking.php')?>
		</sidebar>
	</div><!-- info -->	
</div><!-- content -->	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/footer.php')?>
<script src="/_/js/cycle.js" type="text/javascript"></script>
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
				speed: 500,
				timeout: 10000
			});
		});
	});

	</script>
</body>
</html>








