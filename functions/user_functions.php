<?php

function addUser($email, $password, $displayName, $force_password_change)
{
	global $db;

	$query = '
	INSERT INTO users
	(usr_email, display_name, usr_password, force_password_change)
	VALUES
	(?, ?, ?, ?)
	';

	$stmt = $db->prepare($query);
	$stmt->execute(array($email, $displayName, md5($password),  $force_password_change));
}

function loginUser($user)
{
	$usr_id = $user['usr_id'];
	recordLogin($usr_id);
	updateUserLoginTime($usr_id);
	$_SESSION['id'] = $usr_id;
	$_SESSION['user'] = $user;
	goToRedirect();
	removeRedirect();
}

function recordLogin($usr_id)
{
	global $db;

	$query = '
	INSERT INTO logins
	(usr_id, ip)
	VALUES
	(?, ?)
	';

	$stmt = $db->prepare($query);
	$stmt->execute(array($usr_id, $_SERVER['REMOTE_ADDR']));
}

function updateUserLoginTime($usr_id)
{
	global $db;
	$query = '
	UPDATE users SET usr_last_ip = ?, usr_last_login = NOW() WHERE usr_id = ?
	';

	$stmt = $db->prepare($query);
	$stmt->execute(array($_SERVER['REMOTE_ADDR'], $usr_id));	
}

function changePassword($user, $password)
{
	global $db;
	$query = '
	UPDATE users SET usr_password = ? WHERE usr_id = ?
	';

	$stmt = $db->prepare($query);
	$stmt->execute(array(md5($password), $user['usr_id']));	

	if (isset($_SESSION['user'])):
		$_SESSION['user']['force_password_change'] = 0;
		$_SESSION['user']['password'] = $password;
	endif;
}

function getUserByEmail($email)
{
  global $db;
  $query = "
  SELECT * FROM users 
  WHERE usr_email = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($email));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  return $user;
}

function getUserByID($id)
{
  global $db;
  $query = "
  SELECT * FROM users 
  WHERE usr_id = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  return $user;
}

/**
 * Check if the password given corresponds with an email address
 * 
 * @param password The supplied password
 * @param email The supplied email address
 * @return boolean Whether or not the password matches the one in the database
 * @author Scott Montgomery
 **/
function check_password_correct($email, $password){
  global $db;
  $query = "
  SELECT * FROM users 
  WHERE usr_email = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($email));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  return md5($password) == $user['usr_password'];
}

/**
 * Check if user exists in database
 * 
 * @author Scott Montgomery
 * @return Boolean if the user is found in the database or not
 **/
function user_exists($email){

  global $db;
  $query = "
    SELECT COUNT(*) FROM users
    WHERE usr_email = ?
  ";  
   
  $stmt = $db->prepare($query);
  $stmt->execute(array($email));

  $row = $stmt->fetch();
  return $row[0] > 0;
}

function getUsers()
{
  global $db;
  $query = "
    SELECT * FROM users
  ";
  $stmt = $db->prepare($query);
  $stmt->execute();

  $users = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $users[] = $row;
  }

  return $users;  
}



