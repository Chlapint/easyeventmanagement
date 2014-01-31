<?php
$this->getBlock('design/header', $data);
?>
<h2>Foire aux questions</h2>
<ul>
	<li class="help-ask">
		Comment créer un évènement ?
		<div class="help-answer">
			"Mes évènements" -> Nouveau
		</div>
	</li>
	<li class="help-ask">
		Comment rajouter un volontaire ?
		<div class="help-answer">
			"Mes bénévoles" -> Nouveau
		</div>
	</li>	
</ul>
<?php
$this->getBlock('design/footer', $data);
?>
<script type="text/javascript">
if (typeof(jQuery) != 'undefined') {
    jQuery(document).ready(function() {
		jQuery('.help-ask').on('click', function() {
			// jQuery('.help-anwser').show();
		});
	});
}
</script>
