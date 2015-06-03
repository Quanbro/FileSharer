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