<?php

/**
* Require the admin status of the currently logged in user to be set to 1. 
*
**/
function requireAdmin()
{
	requireLogin();
	if (isset($_SESSION['user'])):
		if ($_SESSION['user']['admin'] != 1):
			header('Location: index.php');
		endif;
	else:
		header('Location: index.php');
	endif;
}


/**
* Require the
**/
function requireLogin()
{

	$_SESSION['redirectUrl'] = $_SERVER['REQUEST_URI'];

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