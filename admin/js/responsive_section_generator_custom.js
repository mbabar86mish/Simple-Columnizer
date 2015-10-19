jQuery(document).ready(function () {
    var clicked_th_box = false;

    jQuery(document.body).on('click','ul.bs-glyphicons-list > li', function () {
        var bt_class = jQuery('span:first', this).attr('class');
        if (clicked_th_box) {
            jQuery('.' + clicked_th_box).val(jQuery.trim(bt_class));
            jQuery('#TB_closeWindowButton').click();
        }

    });

    jQuery(document.body).on('click','.thickbox', function () {
        if (jQuery(this).attr('crosspond_textbox')) {
            clicked_th_box = clicked_th_box = jQuery(this).attr('crosspond_textbox');
        }
    });
});