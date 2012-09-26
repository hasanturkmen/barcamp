<h2>Featured Speakers</h2>
<a href="#" class="btn btn-inverse" id="spkr_prev">&laquo;</a>
<a href="#" class="btn btn-inverse" id="spkr_next">&raquo;</a>
<div id="speakers"></div>

<script id="speakerstpl" type="text/template">
{{#speakers}}
	<div class="speaker">
		<h3>{{title}}</h3>
		<h4>with <a href="{{link}}">{{firstname}} {{lastname}}</a></h4>
		<img class="img-rounded" src="{{image}}" alt="photo of {{firstname}} {{lastname}}" />
		<p>{{description}}</p>
		<a class="btn btn-info" href="speakers.php" id="parkingbtn" >More Info</a>
	</div>
{{/speakers}}
</script>

