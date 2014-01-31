<?php
$this->getBlock('design/header', $data);
?>

<h2><?php echo $data['titre']; ?></h2>
<?php
$this->getParentBlock($data);
?>

<?php
$this->getBlock('design/footer', $data);
?>