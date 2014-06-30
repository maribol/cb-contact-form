<?php

function cb_send_message()
{
  if (!wp_verify_nonce($_REQUEST['nonce'], "cb_contact_form_nonce")) {
    exit("No naughty business please");
  }

  if (function_exists('wp_mail')) {

    $user_name = $_REQUEST['cb_contact_name'];
    $user_email = $_REQUEST['cb_contact_email'];
    $user_subject = $_REQUEST['cb_contact_subject'];
    $user_message = $_REQUEST['cb_contact_message'];

    $error = '';
    if ($user_name == '') {
      $error = __('Your name is required', 'cb_contact_form');
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
      $error = __('Invalid email address', 'cb_contact_form');
    }
    if ($user_subject == '') {
      $error = __('The subject is required', 'cb_contact_form');
    }
    if ($user_message == '') {
      $error = __('The message is required', 'cb_contact_form');
    }
    if ($error != '') {
      exit(json_encode(array('code' => 0, 'message' => $error)));
    }

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
