<?php

function recordDownload($user, $file)
{
	global $db;
	global $db;

	$query = '
	INSERT INTO downloads
	(usr_id, file_id, ip)
	VALUES
	(?, ?, ?)
	';

	$stmt = $db->prepare($query);
	$stmt->execute(array($file['file_id'], $user['usr_id'], $_SERVER['REMOTE_ADDR']));	
}