<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register for Barcamp Deland -- October 6, 2012 in Downtown Deland</title>
	<meta name="description" CONTENT="We need your help sponsoring BarCamp Deland. We hope to gather enough sponsorship money to print t-shirts and provide food for the event. Sponsoring BarCamp is a great way to support Deland's tech, design and creative community. A technology conference in Downtown Deland, FL on Saturday, October 6, 2012.">
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/head_common.php')?>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/navigation.php')?>
<div id="content" class="container-fluid">
<?php include($_SERVER['DOCUMENT_ROOT'].'/_/components/header.php')?>
	<div id="info" class="row-fluid">
		<article id="helpsponsor" class="span9">

			<h2>Making a donation</h2>
			<p>All payments received are non-refundable. Make checks payable to: Mainstreet Deland Association (write Barcamp Deland in the memo) • 100 N. Woodland Blvd. Suite 4. DeLand, FL 32720. Tel. 386.738.0649 or 

			<a href="https://www.paypal.com/webscr?cmd=_donations&business=info@mainstreetdeland.org&item_name=Support%20BarCamp%20Deland&currency_code=USD">send money through paypal</a> to info@mainstreetdeland.org.</p>

			<p><a  class="btn btn-warning" href="https://www.paypal.com/webscr?cmd=_donations&business=info@mainstreetdeland.org&item_name=Support%20BarCamp%20Deland&currency_code=USD">Donate via PayPal</a></p>


			<h2>Download a PDF Form</h2>
			<p>There’s no obligation to fill it out, but some companies require this paperwork.  If you don’t need it, please ignore it. You can <a href="assets/sponsor_barcampdeland.pdf">download a PDF version of our sponsorship form</a>.</p>

			<h2>Help us sponsor BarCamp Deland</h2>
			<p>An event like this can't happen without the help and support of sponsors. We hope to gather enough sponsorship money to print t-shirts and provide food for the event. Sponsoring BarCamp is a great way to support Deland's tech, design and creative community. We accept contributions in any amount, but the following is suggested:</p>

			<h3>Silver Sponsorship--$250</h3>
			<ul>
				<li>Company logo on our web sponsor area througout the year</li>				<li>Company logo on all print materials (ads, flyers, posters)</li>				<li>Company logo on the sponsor poster at event</li>				<li>Promoted via Facebook &amp; Twitter and email campaigns</li>			</ul>

			<h3>Gold Sponsorship - $500</h3>
			<ul>
				<li>All of the above, plus</li>				<li>Logo appears on t-shirts (must be received before 09.17.12)</li>				<li>Opportunity to post signage or banner on a single venue</li>				<li>Opportunity to contribute flyers/giveaway items during registration</li>			</ul>


			<h3>Premiere Sponsorship - $1,000</h3>
			<ul>
				<li>All of the above, plus</li>				<li>Premium position on print, web, poster, social media and email campaigns</li>				<li>Opportunity to post signage or banner on all venues</li>				<li>Logo will appear on the name badges</li>				<li>Logo appears in the session sign-up board</li>				<li>Opportunity to introduce speakers at a single venue</li>				<li>Table available for company material, brochures, job announcements, etc.</li>
			</ul>

			<p>We encourage sponsors to attend and fully participate in BarCamp Deland. This event is being organized in partnership with the <a href="http://mainstreetdeland.org">Mainstreet Deland Organization</a>.</p>			
			
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
	<script>
	$(function() {
		$.getJSON('/_/data/sponsors.json', function(data) {
		    template = $('#sponsorsfttpl').html();
		    html = Mustache.to_html(template, data);
		    $('#sponsorsfooter').html(html);
		});

	});
	</script>
</body>
</html>








