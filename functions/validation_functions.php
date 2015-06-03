<?php


function validateEmail($email, $errors)
{
	if (empty($email)):
		$errors[] = "Please enter your email address";
	elseif (!preg_match('/@.+\..+/', $email)):
		$errors[] = "Please enter a valid email address.";
	endif;

	return $errors;
}

function validatePassword($password, $errors)
{
	$min_password_length = 8;
	$password_has_capitals = true;
	$password_has_numbers = true;

	if (strlen($password) < $min_password_length):
		$errors[] = sprintf("Password must be at least %s characters long.", $min_password_length);
	endif;

	if ($password_has_capitals and !preg_match('/[A-Z]+/', $password)):
		$errors[] = sprintf("Password must have at least %s capital letter in it.", 1);
	endif;

	if ($password_has_numbers and !preg_match('/[0-9]+/', $password)):
		$errors[] = sprintf("Password must have at least %s number in it.", 1);
	endif;

	return $errors;
}

function checkIfEmpty($field, $name, $errors)
{
	if (empty($field)):
		$errors[] = sprintf("Please enter your %s.", $name);
	endif;

	return $errors;
}