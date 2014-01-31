<?php require_once('header.php'); ?>
	<form id="contact" method=post>
		<table>
			<tr>
				<td><label for="surname">Nom</label></td>
				<td><input id="surname" type=text name="surname" placeholder="Votre nom" /></td>
			</tr>
			<tr>
				<td><label for="email">Email</label></td>
				<td><input id="email" type=email  name="email" placeholder="Votre email" /></td>
			</tr>
			<tr>
				<td><label for="message">Message</label></td>
				<td><textarea id="message" placeholder="Votre message"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=submit value="Contacter" /></td>
			</tr>
		</table>
	</form>
<?php
	if (isset($_POST)) {
		$errors = array();
		if (empty($_POST['nom'])) {
			$errors[] = 'Votre nom n\'est pas renseigné';
		}
		if (empty($_POST['email'])) {
			$errors[] = 'Votre email n\'est pas renseigné';
		} elseif (!email) {
			$errors[] = 'Votre email est incorrect';
		}
		if (empty($_POST['message'])) {
			$errors[] 'Vous n\'avez rien à nous dire ?';
		}
		if (!count($errors)) {
			mail();
		}
	}
?>
	<table id="coordonnees">
		<tr>
			<td>Adresse :</td>
			<td>Au milieu de la haute Savoie</td>
		</tr>
		<tr>
			<td>Tél :</td>
			<td>+00 00 00 00 00</td>
		</tr>
		<tr>
			<td>Mail</td>
			<td><a href="mailto:contact@easyeventmanagement.fr">contact @ easyeventmanagement . fr</a></td>
		</tr>
		<tr>
			<td></td>
			<td>Google maps</td>
		</tr>
	</table>
	<div class="clear"></div>
<?php require_once('footer.php'); ?>
