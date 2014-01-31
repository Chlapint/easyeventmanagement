<script type="text/javascript">
if (typeof(jQuery) != 'undefined') {
    jQuery(document).ready(function() {
        jQuery('#connexion').on('click', function(e) {
			e.preventDefault();
			if (jQuery('#form-login').hide()) {
				jQuery('#form-login').show();
			} else {
				jQuery('#form-login').hide();
			}
		});
    });
}
</script>
