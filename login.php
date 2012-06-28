<?php
	include('inc/config.php');
	include('inc/functions.php');
	
	if ($_POST) {
		$nif = $_POST['nif'];
		$passwd = md5($_POST['passwd']);
		$login = false;
		if ($nif != '' && $passwd != '' && checkNIF($nif)) {
			$sql = "SELECT * FROM empleados WHERE nif = '" . $nif . "' AND passwd = '" . $passwd . "'";
			$query = query($sql);
			
			foreach ($query as $row) {
				if ($nif == $row['NIF'] && $passwd == $row['PASSWD']) {
					$login = true;
					session_start();
					$_SESSION['user']['id'] = $row['ID'];
					$_SESSION['user']['nombre'] = $row['NOMBRE'];
					$_SESSION['user']['nivel'] = $row['NIVEL'];
				}
			}
		} else {
			session_start();
			$_SESSION['error'] = true;
		}
	}
	header('Location: index.php');