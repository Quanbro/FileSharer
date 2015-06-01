<?php
/*
    File Name: functions/database.php
    Authors Name: Scott Montgomery
    File Description: This file connects to the database, creating a PDO.                    
*/
$debug = true;
$host = 'localhost';
$database = 'filesharer';
$dsn = 'mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8';
if ($debug):
	$username = 'root';
	$password = '';	
else:
  $username = '';
  $password = '';
endif;

try{
  $db = new PDO($dsn, $username, $password);
  //set error mode to most similar to mysql errors
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch (Exception $e){
  exit($e);
}

?>