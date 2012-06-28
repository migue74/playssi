<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	session_start();
	if ($_SESSION['user']) {
		query("DELETE FROM pujas WHERE id_subasta = {$_GET['id']}");
		query("DELETE FROM subastas WHERE id = {$_GET['id']}");
	}
	header('Location: ../index.php?pag=subastas');