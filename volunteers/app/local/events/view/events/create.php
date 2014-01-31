<?php
$this->getBlock('design/header', $data);
$users = $this->getModel('users');
$auth = $users->getAuth();
?>

<h2>Créer un évènement</h2>
<form method=post action="<?php echo __WWW__; ?>/events/create">
	<input type=hidden id="eem_events-clementine_users_id" name="eem_events-clementine_users_id" value="<?php echo $auth['id']; ?>" />
<?php
	$this->getParentBlock($data);
?>
</form>

<?php
$this->getBlock('design/footer', $data);
?>
