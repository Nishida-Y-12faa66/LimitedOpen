<?php
	session_start();

	if(!isset($_SESSION['name'])){
		header('Location:index.php');
	}

	require('./tpl/confirm.php');
?>
