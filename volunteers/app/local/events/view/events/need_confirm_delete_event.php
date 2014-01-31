<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('body').delegate('.need_confirm_delete_event', 'click', function (e) {
            var this_href = jQuery(this).attr('href');
            var confirmed_href = jQuery(this).attr('confirmed_href');
            if (confirmed_href) {
                jQuery(this).attr('href', confirmed_href);
            }
var text_confirm = 'Un email sera envoyé à tous les bénévoles pour les prévenir de l\'annulation de l\'évènement.\n'+
'Confirmer la suppresion ?';
            if (!confirm(text_confirm)) {
                jQuery(this).attr('href', this_href);
                return false;
            }
        });
    });
</script>
