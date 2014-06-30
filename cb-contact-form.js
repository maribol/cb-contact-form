jQuery(function() {
  jQuery('#cb_contact_form').on('submit', function() {
    jQuery('.cb_contact_submit').show();
    jQuery('.cb_contact_submit_loading').hide();
    if (isValid()) {
      jQuery('.cb_contact_submit').hide();
      jQuery('.cb_contact_submit_loading').show();
      jQuery.get(cbForm.ajax_url, jQuery('#cb_contact_form').serialize(), function(result) {
        jQuery('.cb_contact_submit').show();
        jQuery('.cb_contact_submit_loading').hide();
        json = jQuery.parseJSON(result);
        if (json.code == 1) {
          jQuery('.cb_contact_result').addClass('cb_contact_success');
          jQuery('.cb_contact_field input, .cb_contact_field textarea').val('');
        } else {
          jQuery('.cb_contact_result').addClass('cb_contact_error');
        }
        jQuery('.cb_contact_result').text(json.message).show();
      });
    } else {
      jQuery('.cb_contact_field input, .cb_contact_field textarea').on('keyup', function() {
        isValid();
      });
    }
  });
});

function isValid() {
  jQuery('.cb_input_error').remove();
  valid = 1;
  if (!isEmail(jQuery('#cb_contact_email').val())) {
    error = '<span class="cb_input_error">Email address is invalid.</span>';
    jQuery('#cb_contact_email').parent().append(error);
    valid = 0;
  }
  if (jQuery('#cb_contact_name').val() == '') {
    error = '<span class="cb_input_error">This field is required.</span>';
    jQuery('#cb_contact_name').parent().append(error);
    valid = 0;
  }
  if (jQuery('#cb_contact_subject').val() == '') {
    error = '<span class="cb_input_error">This field is required.</span>';
    jQuery('#cb_contact_subject').parent().append(error);
    valid = 0;
  }
  if (jQuery('#cb_contact_message').val() == '') {
    error = '<span class="cb_input_error">This field is required.</span>';
    jQuery('#cb_contact_message').parent().append(error);
    valid = 0;
  }
  return valid;
}

function isEmail(a) {
  return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(a);
}