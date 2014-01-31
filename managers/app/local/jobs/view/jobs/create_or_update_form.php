<fieldset>
	<legend>Informations complémentaires</legend>
	<table id="form-user">
		<thead>
			<tr>
				<th>Label</th>
				<th>Type</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
		<?php
if (count($data['form_user'])) {
	foreach ($data['form_user'] as $key => $field) {
?>
			<tr id="<?php echo 'line' . $key; ?>">
				<td><input type=text name="label[]" value="<?php echo $field['label']; ?>" /></td>
				<td>
					<select name="type[]">
						<option></option>
						<option <?php echo ($field['type'] == 'choice' ? 'selected' : ''); ?> value="choice">Choix (o/n)</option>
						<option <?php echo ($field['type'] == 'date' ? 'selected' : ''); ?> value="date">Date</option>
						<option <?php echo ($field['type'] == 'text' ? 'selected' : ''); ?> value="text">Texte</option>
						<option <?php echo ($field['type'] == 'number' ? 'selected' : ''); ?> value="number">Nombre</option>
					</select>
					<input id="<?php echo 'del' . $key; ?>" class="del_field" type=button value="X" />
				</td>
			</tr>
<?php
	}
}
?>
			<tr id="line">
				<td><input type=text name="label[]" /></td>
				<td>
					<select name="field[]">
						<option></option>
						<option value="choice">Choix (o/n)</option>
						<option value="date">Date</option>
						<option value="text">Texte</option>
						<option value="number">Nombre</option>
					</select>
					<input id="del" class="del_field" type=button value="X" />
				</td>
			</tr>
		</tbody>
	</table>
	<input id="add_field" type=button value="Ajouter un champ" />
</fieldset>
<?php
$this->cssjs->register_foot('manage_fields_form', $this->getBlockHtml('jobs/manage_fields_form', $this->data));
?>
