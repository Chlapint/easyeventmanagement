<?php
$this->getBlock('design/header', $data);
?>

<?php
if ($data['register']) {
?>
Vous avez été pré-inscrit pour :<?php echo 'event name'; ?><br />
L'organisateur vous tiendra informé et validera votre inscription définitive.
<?php
} else {
	$this->getBlock('volunteers/form_volunteers');
}
?>

<?php
$this->getBlock('design/footer', $data);
?>
