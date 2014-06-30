<p>
  <label for="title"><?php _e('Title:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>
<p>
  <label for="title"><?php _e('Subject:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('subject'); ?>" name="<?php echo $this->get_field_name('subject'); ?>" type="text" value="<?php echo esc_attr($subject); ?>">
</p>
<p>
  <label for="sendto"><?php _e('Send to:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('sendto'); ?>" name="<?php echo $this->get_field_name('sendto'); ?>" type="text" value="<?php echo esc_attr($sendto); ?>">
</p>
<p>
  <label for="send_button"><?php _e('Send button text:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('send_button'); ?>" name="<?php echo $this->get_field_name('send_button'); ?>" type="text" value="<?php echo esc_attr($send_button); ?>">
</p>
<p>
  <label for="cb_contact_success_message"><?php _e('Success message:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('success_message'); ?>" name="<?php echo $this->get_field_name('success_message'); ?>" type="text" value="<?php echo esc_attr($success_message); ?>">
</p>

<h3>Visible Fields</h3>
<p>
  <input id="cb_visible_name" name="<?php echo $this->get_field_name('cb_visible_name'); ?>" <?php echo $cb_visible_name == 1 || $cb_visible_name == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_visible_name"><?php _e('Name'); ?></label> 
</p>
<p>
  <input id="cb_visible_email" name="<?php echo $this->get_field_name('cb_visible_email'); ?>" <?php echo $cb_visible_email == 1 || $cb_visible_email == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_visible_email"><?php _e('Email'); ?></label> 
</p>
<p>
  <input id="cb_visible_subject" name="<?php echo $this->get_field_name('cb_visible_subject'); ?>" <?php echo $cb_visible_subject == 1 || $cb_visible_subject == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_visible_subject"><?php _e('Subject'); ?></label> 
</p>
<p>
  <input id="cb_visible_message" name="<?php echo $this->get_field_name('cb_visible_message'); ?>" <?php echo $cb_visible_message == 1 || $cb_visible_message == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_visible_message"><?php _e('Message'); ?></label> 
</p>

<h3>Required Fields</h3>
<p>
  <input id="cb_required_name" name="<?php echo $this->get_field_name('cb_required_name'); ?>" <?php echo $cb_required_name == 1 || $cb_required_name == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_required_name"><?php _e('Name'); ?></label> 
</p>
<p>
  <input id="cb_required_email" name="<?php echo $this->get_field_name('cb_required_email'); ?>" <?php echo $cb_required_email == 1 || $cb_required_email == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_required_email"><?php _e('Email'); ?></label> 
</p>
<p>
  <input id="cb_required_subject" name="<?php echo $this->get_field_name('cb_required_subject'); ?>" <?php echo $cb_required_subject == 1 || $cb_required_subject == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_required_subject"><?php _e('Subject'); ?></label> 
</p>
<p>
  <input id="cb_required_message" name="<?php echo $this->get_field_name('cb_required_message'); ?>" <?php echo $cb_required_message == 1 || $cb_required_message == '' ? 'checked' : ''; ?> type="checkbox" value="1">
  <label for="cb_required_message"><?php _e('Message'); ?></label> 
</p>
