<?php
$this->getBlock('design/header', $data);
$auth = $this->users->getAuth();
?>

<h2>Créer un poste</h2>
<form method=post action="<?php echo __WWW__; ?>/jobs/create">
	<input type=hidden id="eem_jobs-clementine_users_id" name="eem_jobs-clementine_users_id" value="<?php echo $auth['id']; ?>" />
	<fieldset>
		<legend>Informations de base</legend>
<?php
$this->getParentBlock($data);
?>
	</fieldset>
	
	<input type=submit value="Créer un poste" />
	<a class="clementine_crud-create-backbutton backbutton" href="<?php echo __WWW__ . '/jobs'; ?>">Retour</a>
</form>

<?php
$this->getBlock('design/footer', $data);
?>
<script type="text/javascript">
if (typeof(jQuery) != 'undefined') {
	jQuery(document).ready(function() {
		jQuery('#form-user').on('submit', function() {
			// link post
		});
	});
}
</script>
