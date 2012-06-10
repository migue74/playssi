<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$nif = $_POST['nif'];
		$email = $_POST['email'];
		$tlf = $_POST['tlf'];
		$direccion = $_POST['direccion'];
		$poblacion = $_POST['poblacion'];
		$cp = $_POST['cp'];
		
		$sql = "INSERT INTO clientes (id, nombre, nif, email, telefono, direccion, poblacion, cp)
				VALUES (sec_clientes.NEXTVAL, '$nombre', '$nif', '$email', '$tlf', '$direccion', '$poblacion', '$cp')";
		
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
		header('Location: ../index.php?pag=clientes');
	}