<footer>
	<div id="sponsors" class="clearfix">
		<h3>Sponsored by</h3>
		<ul id="sponsorsfooter"></ul>
	</div>

	<script id="sponsorsfttpl" type="text/template">
	{{#sponsors}}
		<li><a href="{{link}}"><img src="{{image}}" alt="Sponsor: {{name}}" /></a></li>
	{{/sponsors}}
	</script>


</footer>

<script src="../_/js/import.js" type="text/javascript"></script>
<script src="../_/js/myscript.js" type="text/javascript"></script>    

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=226093004165607";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>