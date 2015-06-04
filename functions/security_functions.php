<?php

function requireAdmin()
{
	if (isset($_SESSION['user'])):
		if ($_SESSION['user']['admin'] != 1):
			header('Location: index.php');
		endif;
	else:
		header('Location: index.php');
	endif;
}


/**
* 
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