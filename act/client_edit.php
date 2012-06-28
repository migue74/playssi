<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$nif = $_POST['nif'];
		$email = $_POST['email'];
		$tlf = $_POST['tlf'];
		$direccion = $_POST['direccion'];
		$poblacion = $_POST['poblacion'];
		$cp = $_POST['cp'];
		
		if ($nombre != '' && checkNIF($nif) && checkEmail($email) && $tlf != '' && $direccion != '' && $poblacion != '' && is_numeric($cp)) {		
			$sql = "UPDATE clientes SET nombre = '$nombre', nif = '$nif', email = '$email', telefono = '$tlf', direccion = '$direccion', poblacion = '$poblacion', cp = '$cp' WHERE id = $id";
			
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
		header('Location: ../index.php?pag=clientes&id=' . $id);
	}