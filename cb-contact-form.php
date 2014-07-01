<?php

/**
 * Plugin Name: CB Contact Form
 * Plugin URI: http://codebuzz.ro/
 * Description: There are many contact form plugins and most of them have too many options that you don't need.
 * Version: 1.1
 * Author: CodeBuzz (Samuel Todosiciuc)
 * Author URI: http://codebuzz.ro/author/samuel/
 */

require 'CBContactWidget.class.php';
require 'functions.php';

function register_cb_contact_widget()
{
  register_widget('CBContact_Widget');
}

add_action('widgets_init', 'register_cb_contact_widget');

add_action("wp_ajax_cb_send_message", "cb_send_message");
add_action("wp_ajax_cb_nopriv_send_message", "cb_send_message");

wp_enqueue_style('cb-contact-form-css', plugin_dir_url(__FILE__) . 'cb-contact-form.css', array(), '1.1');
wp_enqueue_script('cb-contact-form-js', plugin_dir_url(__FILE__) . 'cb-contact-form.js', array(), '1.1', true);
