<?php
	include('inc/config.php');
	include('inc/functions.php');
	
	if ($_POST) {
		$nif = $_POST['nif'];
		$passwd = md5($_POST['passwd']);
		$sql = "SELECT * FROM empleados WHERE nif = '" . $nif . "' AND passwd = '" . $passwd . "'";
		$query = query($sql);
		echo '<pre>' . print_r($query, true) . '</pre>';
		foreach ($query as $row) {
			if ($nif == $row['NIF'] && $passwd == $row['PASSWD']) {
				//setcookie('login', 'login', time() + 2592000);
				//echo 'Correcto';
			}
		}
	}