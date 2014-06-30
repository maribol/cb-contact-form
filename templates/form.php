<form id="cb_contact_form" action="javascript:;">

  <div class="cb_contact_result"></div>

  <input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
  <input type="hidden" name="action" value="cb_send_message" />
  <div class="cb_contact_field">
    <label for="cb_contact_name"><?php echo __('Name', 'cb_contact_form'); ?></label>
    <input type="text" name="cb_contact_name" id="cb_contact_name" value=""/>
  </div>
  <div class="cb_contact_field">
    <label for="cb_contact_email"><?php echo __('Email', 'cb_contact_form'); ?></label>
    <input type="text" name="cb_contact_email" id="cb_contact_email" value="" />
  </div>
  <div class="cb_contact_field">
    <label for="cb_contact_subject"><?php echo __('Subject', 'cb_contact_form'); ?></label>
    <input type="text" name="cb_contact_subject" id="cb_contact_subject" value="" />
  </div>
  <div class="cb_contact_field">
    <label for="cb_contact_message"><?php echo __('Message', 'cb_contact_form'); ?></label>
    <textarea name="cb_contact_message" id="cb_contact_message"></textarea>
  </div>
  <input class="cb_contact_submit" type="submit" value="<?php echo $send_button;?>" />
  <input class="cb_contact_submit_loading" type="submit" disabled value="Please wait..." />
</form>
<script>
  cbForm = {
    ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>'
  }
</script>