<ul id="list-events">	
<?php
if (isset($data['events'])) {
	foreach ($this->data['events'] as $event) {
		$places_dispo = ($event['eem_events.max_volunteers'] - $event['eem_events.nb_volunteers']);
		if ($places_dispo) {
?>
	<li class="event-box">
		<h3><?php echo $event['eem_events.name']; ?></h3>
<?php
			if ($event['eem_events.logo']) {
?>
		<img src="<?php echo __WWW_ROOT__ . '/files/logos/' . $event['eem_events.clementine_users_id'] . $event['eem_events.logo']; ?>" />
<?php
			}
?>
		<a class="register-events" href="<?php echo __WWW__ . '/events/register?id=' . $event['eem_events.id']; ?>">Participez !</a>
		<img src="" />
		<h4>Infos pratiques</h4>
		<ul>
			<li>Lieu : <?php echo $event['eem_events.place']; ?></li>
			<li>Dates : <?php echo $event['eem_events.date_start'] . ' au ' . $event['eem_events.date_end']; ?></li>
			<li>Places disponibles : <?php echo $places_dispo; ?></li>
		</ul>
	</li>
<?php
		}
	}
}
if (isset($data['search']) && !isset($data['events'])) {
?>
	<li class="event-box">Aucun résultat ne correspond à votre recherche.</li>
<?php
}
?>
</ul>
