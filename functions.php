<?php

function cb_send_message()
{
  if (!wp_verify_nonce($_REQUEST['nonce'], "cb_contact_form_nonce")) {
    exit("No naughty business please");
  }
  if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    exit(json_encode(array('code' => 0, 'message' => __('Please try again later', 'cb_contact_form'))));
  }

  if (function_exists('wp_mail')) {

    $user_email = $_REQUEST['cb_contact_email'];
    $user_subject = $_REQUEST['cb_contact_subject'];
    $user_message = $_REQUEST['cb_contact_message'];

    $sendto = get_option('cb_contact_email', get_bloginfo('admin_email'));
    $subject = get_option('cb_contact_subject', 'Message from ' . get_bloginfo('name'));

    $headers = array();
    $headers[] = 'From: ' . $user_name . ' <' . $user_email . '>';
    $result = wp_mail($sendto, $subject . ($user_subject != '' ? ': ' . $user_subject : ''), $user_message, $headers);
    $default_success = __('Thank you for your message.', 'cb_contact_form');
    $success_message = get_option('cb_contact_success_message', $default_success);
    exit(json_encode(array('code' => $result ? 1 : 0, 'message' => $result ? ($success_message == '' ? $default_success : $success_message) : __('Please try again later', 'cb_contact_form'))));
  }
  exit(json_encode(array('code' => 3)));
}
