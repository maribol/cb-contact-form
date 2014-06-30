<form id="cb_contact_form" action="javascript:;">

  <div class="cb_contact_result"></div>

  <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
  <input type="hidden" name="action" value="cb_send_message" />

  <?php if (isset($fields['cb_visible_name']) && $fields['cb_visible_name'] != 0): ?>
    <div class="cb_contact_field">
      <label for="cb_contact_name"><?php echo __('Name', 'cb_contact_form'); ?></label>
      <input type="text" name="cb_contact_name" id="cb_contact_name" value=""/>
    </div>
  <?php endif; ?>
  <?php if (isset($fields['cb_visible_email']) && $fields['cb_visible_email'] != 0): ?>
    <div class="cb_contact_field">
      <label for="cb_contact_email"><?php echo __('Email', 'cb_contact_form'); ?></label>
      <input type="text" name="cb_contact_email" id="cb_contact_email" value="" />
    </div>
  <?php endif; ?>
  <?php if (isset($fields['cb_visible_subject']) && $fields['cb_visible_subject'] != 0): ?>
    <div class="cb_contact_field">
      <label for="cb_contact_subject"><?php echo __('Subject', 'cb_contact_form'); ?></label>
      <input type="text" name="cb_contact_subject" id="cb_contact_subject" value="" />
    </div>
  <?php endif; ?>
  <?php if (isset($fields['cb_visible_message']) && $fields['cb_visible_message'] != 0): ?>
    <div class="cb_contact_field">
      <label for="cb_contact_message"><?php echo __('Message', 'cb_contact_form'); ?></label>
      <textarea name="cb_contact_message" id="cb_contact_message"></textarea>
    </div>
  <?php endif; ?>
  <input class="cb_contact_submit" type="submit" value="<?php echo $send_button; ?>" />
  <input class="cb_contact_submit_loading" style="display:none !important;" type="submit" disabled value="Please wait..." />
</form>
<script>
  cbForm = {
    ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>'
  };
  function isValid() {
    jQuery('.cb_input_error').remove();
    valid = 1;
<?php foreach ($fields as $field => $value): ?>
  <?php if (substr($field, 0, 11) == 'cb_required' && $value == 1 && $fields[str_replace('cb_required', 'cb_visible', $field)] == 1): ?>
    <?php if ($field == 'cb_required_email'): ?>
          if (!isEmail(jQuery('#<?php echo str_replace('cb_required', 'cb_contact', $field); ?>').val())) {
            error = '<span class="cb_input_error">Email address is invalid.</span>';
            jQuery('#<?php echo str_replace('cb_required', 'cb_contact', $field); ?>').parent().append(error);
            valid = 0;
          }
    <?php else: ?>
          if (jQuery('#<?php echo str_replace('cb_required', 'cb_contact', $field); ?>').val() == '') {
            error = '<span class="cb_input_error">This field is required.</span>';
            jQuery('#<?php echo str_replace('cb_required', 'cb_contact', $field); ?>').parent().append(error);
            valid = 0;
          }
    <?php endif; ?>
  <?php endif; ?>
<?php endforeach; ?>
    return valid;
  }
</script>