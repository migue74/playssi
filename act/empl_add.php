<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$nif = $_POST['nif'];
		$tlf = $_POST['tlf'];
		$direccion = $_POST['direccion'];
		$poblacion = $_POST['poblacion'];
		$cp = $_POST['cp'];
		$sucursal = $_POST['sucursal'];
		$passwd = $_POST['passwd'];
		
		if ($nombre != '' && checkNIF($nif) && $tlf != '' && $direccion != '' && $poblacion != '' && is_numeric($cp) && $sucursal != '' && $passwd != '') {
			$sql = "INSERT INTO empleados (id, nombre, nif, telefono, direccion, poblacion, cp, sucursal, passwd)
					VALUES (sec_empleados.NEXTVAL, '$nombre', '$nif', '$tlf', '$direccion', '$poblacion', '$cp', '$sucursal', '$passwd')";
			
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
			$_SESSION['action'] = 'add';
		} else {
			session_start();
			$_SESSION['action'] = 'error';
		}
		header('Location: ../index.php?pag=empleados');
	}