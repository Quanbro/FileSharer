<?php

function addUser()
{

}

function recordLogin()
{

}

function changePassword()
{

}

function getUserByLogin()
{

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
  $password = secure_password($password);
  
  if ($password == $user['usr_password']){
  	return $user['id'];
  }
  return false;
}

function setUserStatus()
{
	
}
/**
* Ensure a user is currently logged in my checking the value of the 
**/
function requireLogin()
{
	if (empty($_SESSION['email'])) :
		header('Location: login.php');
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

