<?php
$this->getBlock('design/header', $data);
?>
<div id="left">
<?php
$this->getParentBlock($data);
?>
	<a href="<?php echo __WWW__ . '/volunteers'; ?>">
		Retour
	</a>
</div>
<div id="right">
	<div id="statuts">
		Etat du dossier
		
		Planning envoyé : oui/non
	</div>
	<div id="notifications">
	</div>
	<div id="candidacy">
<?php
	if (!$candidacy) {
?>
		<a href="<?php echo __WWW__ . '/volunteers/accept_candidacy?'; ?>">
			Accepter la candidature
		</a>
<?php
	} else {
?>
		<a href="<?php echo __WWW__ . '/volunteers/deny_candidacy?'; ?>">
			Refuser la candidature
		</a>
<?php
	}
?>
	</div>
</div>
<div class="clear"></div>
<?php
$this->getBlock('design/footer', $data);
?>
