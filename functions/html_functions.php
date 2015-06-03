<?php
/**
 * Get all of the messages that are stored in the session
 * 
 * @return An array with all messages
 * @author Scott Montgomery
 **/
function get_messages() {
    $messages_array = array();
    if (isset($_SESSION['messages'])) :
        $messages_array = $_SESSION['messages'];
        unset($_SESSION['messages']);        
    endif;
    return $messages_array;
}
/**
 * Add a message to the session variable
 * 
 * @param message_type The type of message we are creating
 * @param The message to add to the session variable
 * @author Scott Montgomery
 **/
function set_message($message_type, $message) {
  $_SESSION['messages'][$message_type][] = $message;
}
function display($string) {
  echo htmlentities($string);
}
function display_field($field_name, $text) {
  if ($text != '') {
    echo $field_name . ': ';
    echo (htmlentities($text));
  }
}