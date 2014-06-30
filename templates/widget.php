<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>
<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Subject:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('subject'); ?>" name="<?php echo $this->get_field_name('subject'); ?>" type="text" value="<?php echo esc_attr($subject); ?>">
</p>
<p>
  <label for="<?php echo $this->get_field_id('sendto'); ?>"><?php _e('Send to:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('sendto'); ?>" name="<?php echo $this->get_field_name('sendto'); ?>" type="text" value="<?php echo esc_attr($sendto); ?>">
</p>
<p>
  <label for="<?php echo $this->get_field_id('send_button'); ?>"><?php _e('Send button text:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('send_button'); ?>" name="<?php echo $this->get_field_name('send_button'); ?>" type="text" value="<?php echo esc_attr($send_button); ?>">
</p>
<p>
  <label for="<?php echo $this->get_field_id('cb_contact_success_message'); ?>"><?php _e('Success message:'); ?></label> 
  <input class="widefat" id="<?php echo $this->get_field_id('success_message'); ?>" name="<?php echo $this->get_field_name('success_message'); ?>" type="text" value="<?php echo esc_attr($success_message); ?>">
</p>