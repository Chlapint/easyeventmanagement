<?php require_once('header.php'); ?>
<?php
$url_managers = 'http://managers.easyeventmanagement.fr';
$url_volunteers = 'http://volunteers.easyeventmanagement.fr';
if ($_SERVER['REQUEST_URI'] == '/easyeventmanagement/') {
	$url_managers = 'http://localhost/easyeventmanagement/managers';
	$url_volunteers = 'http://localhost/easyeventmanagement/volunteers';
}
?>
	<div id="choice">
		<a href="<?php echo $url_managers; ?>">Organisateurs</a>
		<a href="<?php echo $url_volunteers; ?>">Bénévoles</a>
	</div>
<?php require_once('footer.php'); ?>
