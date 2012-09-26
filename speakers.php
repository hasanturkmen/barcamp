<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register for Barcamp Deland -- October 6, 2012 in Downtown Deland</title>
	<meta name="description" CONTENT="Although this conference encourages everyone to participate by speaking or helping out during an event, we have some exciting confirmed speakers. This page is a list of those speakers who will be presenting at the event.">
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/head_common.php')?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/navigation.php')?>
<div id="content" class="container-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/header.php')?>
	<div id="info" class="row-fluid">
		<article id="speakerspage" class="span9">
			<h2>Featured Speakers</h2>
			<p>Although this conference encourages everyone to participate by speaking or helping out during an event, we have some exciting confirmed speakers. Here's a short list of who'll be at the event. Register for the event if you're interested on speaking at the event.</p>  

		<div id="speakers"></div>
		</article><!-- Main Article -->	
			
		<sidebar id="middle" class="span3 hidden-phone">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_helpsponsor.php')?>
			<iframe id="countdown" class="hidden-phone" src="http://www.eventbrite.com/countdown-widget?eid=3917360932" frameborder="0" height="250" width="200" marginheight="0" marginwidth="0" scrolling="no" allowtransparency="true"></iframe>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_schedule.php')?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/sidebar_twitter.php')?>
		</sidebar>
		
	</div><!-- info -->	
</div><!-- content -->	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/footer.php')?>
	<script id="speakers-template" type="text/template">
	{{#speakers}}
		<div class="speaker">
			<h3>{{category}}: {{title}}</h3>
			<h4>with {{firstname}} {{lastname}}</h4>
			<img class="img-rounded" src="{{image}}" alt="photo of {{firstname}} {{lastname}}" />
			<p>{{bio}}</p>
			<p>{{description}}</p>
			<p><a href="{{link}}">{{link}}</a></p>
		</div>
	{{/speakers}}
	</script>

	<script>
	$(function() {
		$.getJSON('/_/data/speakers.json', function(data) {
		    var template = $('#speakers-template').html();
		    var html = Mustache.to_html(template, data);
		    $('#speakers').html(html);
		});

		$.getJSON('/_/data/sponsors.json', function(data) {
		    template = $('#sponsorsfttpl').html();
		    html = Mustache.to_html(template, data);
		    $('#sponsorsfooter').html(html);
		});

	});
	</script>
</body>
</html>
