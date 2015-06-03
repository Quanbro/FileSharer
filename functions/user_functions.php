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
	$stmt->execute(array($email, $displayName, $password, $password, $force_password_change));
}

function loginUser($user)
{
	$usr_id = $user['usr_id'];
	recordLogin($usr_id);
	updateUserLoginTime($usr_id);
	$_SESSION['id'] = $usr_id;
	$_SESSION['user'] = $user;
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
	$stmt->execute(array($password, $user['usr_id']));	

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
  //$password = secure_password($password);

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
  //$password = secure_password($password);

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
  //$password = secure_password($password);

  return $password == $user['usr_password'];
}

function setUserStatus()
{
	
}
/**
* Ensure a user is currently logged in my checking the value of the 
**/
function requireLogin()
{
	if (empty($_SESSION['id'])) :
		header('Location: login.php');
		die;
	endif;

	$user = $_SESSION['user'];

	if ($user['force_password_change'] == 1):
		header('Location: changePassword.php');
		die;
	endif;
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
  //returns first row
  $row = $stmt->fetch();
  return $row[0] > 0;

}

