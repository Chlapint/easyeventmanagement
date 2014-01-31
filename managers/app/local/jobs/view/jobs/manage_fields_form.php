<script type="text/javascript">
if (typeof(jQuery) != 'undefined') {
    jQuery(document).ready(function() {
		var i = 1;
        jQuery('#add_field').on('click', function(e) {
			jQuery('#form-user').append(
				'<tr id="line'+i+'">'+
				'<td><input type=text name="label[]" /></td>'+
				'<td><select name="field[]">'+
					'<option></option>'+
					'<option value="choice">Choix (o/n)</option>'+
					'<option value="date">Date</option>'+
					'<option value="text">Texte</option>'+
					'<option value="number">Nombre</option>'+
					'</select>'+
					'<input id="del'+i+'" class="del_field" type=button value="X" />'+
				'</td></tr>'
			);
			i++;
		});
		jQuery('.del_field').on('click', function() {
			var id = jQuery(this).attr('id').split('del');
			jQuery('#form-user').remove('line'+id[1]);
			jQuery('line'+id[1]).remove();
		});
    });
}
</script>
