<?php
/* Ce block est appelé automatiquement par Clémentine, qui lui passe pour */
/* paramètre $data le tableau $this->data rempli dans le contrôleur. */
$this->getBlock('design/header', $data);

if ($this->getModel('users')->needAuth()) {
?>
<h2>Bienvenue sur Easy Event Management</h2>
<?php
}

$this->getBlock('design/footer', $data);
?>
