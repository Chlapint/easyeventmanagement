<?php
$this->getBlock('design/header', $data);
$event_id = $request->get('int', 'eem_events-id');
?>
<h2><?php echo ''; ?></h2>
<div id="left">
<?php
$this->getParentBlock($data);
?>
	<a href="<?php echo __WWW__ . '/events'; ?>">
		Retour
	</a>
</div>
<div id="right">
	<ul>
		<li><a href="<?php echo __WWW__ . '/events/volunteers_list?eem_events-id=' . $event_id; ?>">
			Bénévoles inscrits à cet évènement
		</a></li>
		<li><a href="<?php echo __WWW__ . '/events/send_sms?eem_events-id=' . $event_id; ?>">
			Envoyer un sms aux bénévoles
		</a></li>
		<li><a href="<?php echo __WWW__ . '/events/send_mail?eem_events-id=' . $event_id; ?>">
			Envoyer un mail aux bénévoles
		</a></li>
		<li><a href="<?php echo __WWW__ . '/events/send_plannings?eem_events-id=' . $event_id; ?>">
			Envoyer les plannings
		</a></li>
	</ul>
</div>
<div class="clear"></div>
<?php
$this->getBlock('design/footer', $data);
?>
