<?php

class Logger {
  function __construct($args = array()) {
    if(!function_exists('socket_create')) {
      $this->connection = false;  
      return;
    }

    $this->socket = socket_create(AF_INET, SOCK_STREAM, 0);
    $this->connection = @socket_connect($this->socket, '127.0.0.1', '8093');
  }

  function log($obj, $type = 'log') {
    // $type is for future, log, error, warning, etc.

    if($this->connection) {
      $message = $this->parse_log_msg($obj);
      socket_write($this->socket, $message, strlen($message));
    }
  }

  function parse_log_msg($obj) {
    if(is_array($obj) or is_object($obj))
      $to_write = serialize($obj);
    else
      $to_write = $obj;

    return '['.date('h:i:s').'] '.$to_write."\n";
  }
}