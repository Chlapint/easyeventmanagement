<?php
$users = $this->getModel('users');
if ($auth = $users->getAuth()) {
	$groups = $users->getGroupsByUser($auth['id']);
}
$this->getBlock('design/header', $data);
?>
<h2>Mon profil</h2>
<table>
	<tr>
		<td>Email</td>
		<td><input type=email name="email" value="<?php echo $data['user']['login']; ?>" readonly /></td>
	</tr>
	<tr>
		<td>Mot de passe</td>
		<td><input type=password name="password" value="<?php echo $data['user']['password']; ?>" /></td>
	</tr>
	<tr>
		<td>Confirmer le mot de passe</td>
		<td><input type=password name="password_confirm" value="<?php echo $data['user']['password']; ?>" readonly /></td>
	</tr>
	<tr>
		<td>Nom</td>
		<td><input type=email name="surname" value="<?php echo $data['user']['surname']; ?>" /></td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td><input type=email name="firstname" value="<?php echo $data['user']['firstname']; ?>" /></td>
	</tr>
	<tr>
		<td>Pays</td>
		<td><?php $this->getBlock('profil/country_list'); ?></td>
	</tr>
	<tr>
		<td>
</table>

<?php
if (isset($groups['volunteers'])) {
?>
<h3>Informations supplémentaires</h3>
<table>

</table>
<?php
}
$this->getBlock('design/footer');
?>
