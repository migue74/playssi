<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$nif = $_POST['nif'];
		$tlf = $_POST['tlf'];
		$direccion = $_POST['direccion'];
		$poblacion = $_POST['poblacion'];
		$cp = $_POST['cp'];
		$sucursal = $_POST['sucursal'];
		$passwd = $_POST['passwd'];
		
		if ($nombre != '' && checkNIF($nif) && $tlf != '' && $direccion != '' && $poblacion != '' && is_numeric($cp) && $sucursal != '' && $passwd != '') {
			$sql = "UPDATE empleados SET nombre = '$nombre', nif = '$nif', telefono = '$tlf', direccion = '$direccion', poblacion = '$poblacion', cp = '$cp', sucursal = '$sucursal', passwd = '$passwd' WHERE id = $id";
			
			try {
				$conex = new PDO($host, $username, $password);
				$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				if ($newed) $stmt = $conex->query($sql1);
				$stmt = $conex->query($sql);
				$conex = null;
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->GetMessage();
			}
			
			session_start();
			$_SESSION['action'] = 'edit';
		} else {
			session_start();
			$_SESSION['action'] = 'error';
		}
		header('Location: ../index.php?pag=empleados&id=' . $id);
	}