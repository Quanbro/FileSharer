<?php

function setRedirect($url)
{
	$_SESSION['redirectUrl'] = $url;
}

function removeRedirect()
{
	unset($_SESSION['redirectUrl']);
}

function goToRedirect()
{
	if (isset($_SESSION['redirectUrl'])):
		header('Location: ' . $_SESSION['redirectUrl']);
		removeRedirect();
		die;
	endif;
}