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

function checkPassword()
{

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
		header('Location: login.php')
		die;
	endif;
}