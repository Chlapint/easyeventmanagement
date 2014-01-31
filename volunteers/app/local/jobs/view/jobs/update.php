<?php
$this->getBlock('design/header', $data);
?>

<h2>Modifier ce poste</h2>
<fieldset>
	<legend>Informations de base</legend>
<?php
$this->getParentBlock($data);
?>
</fieldset>
<?php
$this->getBlock('jobs/create_or_update_form', $data);
?>

<a class="clementine_crud-create-backbutton backbutton" href="<?php echo __WWW__ . '/managers/jobs/'; ?>">Retour</a>

<?php
$this->getBlock('design/footer', $data);
?>
