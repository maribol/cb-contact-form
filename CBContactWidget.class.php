<?php

class CBContact_Widget extends WP_Widget
{

  /**
   * Register widget with WordPress.
   */
  function __construct()
  {
    parent::__construct(
        'cb_contact_form', // Base ID
        __('CB Contact Form', 'cb_contact_form'), // Name
        array('description' => __('Add CB Contact Form as widget.', 'cb_contact_form'),) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget($args, $instance)
  {
    $nonce = wp_create_nonce("cb_contact_form_nonce");
    $title = apply_filters('widget_title', $instance['title']);

    $plugin_vars = array(
        'fields' => $instance
    );
    extract($plugin_vars);

    if (isset($instance['send_button']) && $instance['send_button'] != '') {
      $send_button = $instance['send_button'];
    } else {
      $send_button = __('Send message', 'cb_contact_form');
    }

    echo $args['before_widget'];
    echo $args['before_title'];
    echo $instance['title'];
    echo $args['after_title'];
    require('templates/form.php');
    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form($instance)
  {
    extract($instance);

    if (isset($instance['title'])) {
      $title = $instance['title'];
    } else {
      $title = __('Contact Us', 'cb_contact_form');
    }

    if (isset($instance['subject']) && $instance['subject'] != '') {
      $subject = $instance['subject'];
    } else {
      $subject = __('Message from ' . get_bloginfo('name'), 'cb_contact_form');
    }
    if (isset($instance['sendto']) && $instance['sendto'] != '') {
      $sendto = $instance['sendto'];
    } else {
      $sendto = get_bloginfo('admin_email');
    }
    if (isset($instance['send_button']) && $instance['send_button'] != '') {
      $send_button = $instance['send_button'];
    } else {
      $send_button = __('Send message', 'cb_contact_form');
    }
    if (isset($instance['success_message']) && $instance['success_message'] != '') {
      $success_message = $instance['success_message'];
    } else {
      $success_message = __('Thank you for your message.', 'cb_contact_form');
    }
    require('templates/widget.php');
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
    $instance['subject'] = (!empty($new_instance['subject']) ) ? strip_tags($new_instance['subject']) : '';
    $instance['sendto'] = (!empty($new_instance['sendto']) ) ? strip_tags($new_instance['sendto']) : '';
    $instance['success_message'] = (!empty($new_instance['success_message']) ) ? strip_tags($new_instance['success_message']) : '';
    $instance['send_button'] = (!empty($new_instance['send_button']) ) ? strip_tags($new_instance['send_button']) : '';

    $instance['cb_visible_email'] = isset($new_instance['cb_visible_email']) && $new_instance['cb_visible_email'] == 1 ? '1' : '0';
    $instance['cb_visible_name'] = isset($new_instance['cb_visible_name']) && $new_instance['cb_visible_name'] == 1 ? '1' : '0';
    $instance['cb_visible_subject'] = isset($new_instance['cb_visible_subject']) && $new_instance['cb_visible_subject'] == 1 ? '1' : '0';
    $instance['cb_visible_message'] = isset($new_instance['cb_visible_message']) && $new_instance['cb_visible_message'] == 1 ? '1' : '0';

    $instance['cb_required_email'] = isset($new_instance['cb_required_email']) && $new_instance['cb_required_email'] == 1 ? '1' : '0';
    $instance['cb_required_name'] = isset($new_instance['cb_required_name']) && $new_instance['cb_required_name'] == 1 ? '1' : '0';
    $instance['cb_required_subject'] = isset($new_instance['cb_required_subject']) && $new_instance['cb_required_subject'] == 1 ? '1' : '0';
    $instance['cb_required_message'] = isset($new_instance['cb_required_message']) && $new_instance['cb_required_message'] == 1 ? '1' : '0';

    if (get_option('cb_contact_email') != '') {
      update_option('cb_contact_email', $instance['sendto'], '', 'no');
    } else {
      add_option('cb_contact_email', $instance['sendto'], '', 'no');
    }

    if (get_option('cb_contact_subject') != '') {
      update_option('cb_contact_subject', $instance['subject'], '', 'no');
    } else {
      add_option('cb_contact_subject', $instance['subject'], '', 'no');
    }

    if (get_option('cb_contact_success_message') != '') {
      update_option('cb_contact_success_message', $instance['success_message'], '', 'no');
    } else {
      add_option('cb_contact_success_message', $instance['success_message'], '', 'no');
    }

    return $instance;
  }

}

// class Foo_Widget