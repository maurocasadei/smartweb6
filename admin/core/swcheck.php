<?php
  session_start();
  foreach (array_keys($_GET) as $key) {
    if (substr($key,0,2)=="ID"){
      settype($_GET[$key],"integer");
    }else{
      $badWords = array("/ union /i","/ drop /i","/--/i","/--union/i","/union--/i");
      $_GET[$key]=preg_replace($badWords, "", $_GET[$key]);
    }
  }
	ini_set('error_reporting', E_ALL);
	ini_set("log_errors", "On");
	ini_set("display_errors", "On");  
	ini_set("error_log", "log/php-error.log");
?>