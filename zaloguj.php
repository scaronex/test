<?php
	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: zgloszenie.php');
		exit();
	}
?>
