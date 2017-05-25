var dom = {
    realty_type: jQuery('#realty_type'),
    transaction_type: jQuery('#transaction_type'),
    form_groups: jQuery('.realty-add__groups .form-group'),
    form_controls: jQuery('.realty-add__groups .realty-add__control')

};

var realty_type_value = dom.realty_type.val();
var transaction_type_value = dom.transaction_type.val();

var showPropsByType = function (realty_id, transaction_id) {
    realty_id = parseInt(realty_id);
    transaction_id = parseInt(transaction_id);

    dom.form_groups.each(function (index, item) {
        var item_realty = jQuery(item).data('realty-type');
        var item_transaction = jQuery(item).data('transaction-type');

        if (jQuery.inArray(realty_id, item_realty) + 1 && jQuery.inArray(transaction_id, item_transaction) + 1) {
            jQuery(dom.form_controls[index]).removeAttr('disabled');
            jQuery(item).addClass('form-group_active');

        } else {
            jQuery(dom.form_controls[index]).attr('disabled', 'disabled');
            jQuery(item).removeClass('form-group_active');
        }
    });
};


showPropsByType(realty_type_value, transaction_type_value);

dom.realty_type.on('change', function (event) {
    realty_type_value = event.target.value;
    showPropsByType(realty_type_value, transaction_type_value);
});

dom.transaction_type.on('change', function (event) {
    transaction_type_value = event.target.value;
    showPropsByType(realty_type_value, transaction_type_value);
});