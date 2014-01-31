<?php
$this->getBlock('design/header', $data);
$users = $this->getModel('users');
$auth = $users->getAuth();
?>

<h2><?php echo $data['titre']; ?></h2>
<form method=post action="<?php echo __WWW__; ?>/events/create">
<?php
	$this->getParentBlock($data);
?>
</form>

<?php
$this->getBlock('design/footer', $data);
?>
