<?php include("_/components/mobile-header.php"); ?>
	<!-- Page: home -->
		<?php include("_/components/header-default.php"); ?>
		<div id="homecontent" data-role="content">
			<img src="images/barcampdeland-hr.png" class="logo" alt="BarCamp Logo" />
			<a href="schedule.php" data-role="button" data-icon="grid">Schedule</a>
			<a href="venues.php" data-role="button" data-icon="grid">Venues</a>
			<a href="info.php" data-role="button" data-icon="info">Info</a>
			<div id="sponsors"></div>
		</div><!-- content -->
		<script id="sponsorsbtpl" type="text/template">
		{{#sponsors}}
			<div class="sponsor">
				<a href="{{tag}}"><img src="{{image}}" alt="Sponsor: {{name}}" /></a>
			</div>
		{{/sponsors}}
		</script>

	<script>
		$(function() {
			$.getJSON('/_/data/sponsors.json', function(data) {
			    var template = $('#sponsorsbtpl').html();
			    var html = Mustache.to_html(template, data);
			    $('#sponsors').html(html);
			    $('#sponsors').cycle({
					fx: 'fade',
				    random:  1,
					speed: 300,
					timeout: 5000
				});
			    template = $('#sponsorsfttpl').html();
			    html = Mustache.to_html(template, data);
			    $('#sponsorsfooter').html(html);
			}); //get json
		}); //jQuery
	</script>
<?php include("_/components/mobile-footer.php"); ?>