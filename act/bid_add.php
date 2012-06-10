<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$cliente = $_POST['cliente'];
		$cantidad = $_POST['cantidad'];
		$id = $_POST['id'];
				
		$sql = "INSERT INTO pujas (id, cantidad, fecha, id_cliente, id_subasta)
				VALUES (sec_pujas.NEXTVAL, $cantidad, CURRENT_TIMESTAMP, $cliente, $id)";
		
		try {
			$conex = new PDO($host, $username, $password);
			$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conex->query($sql);
			$conex = null;
		} catch (PDOException $e) {
			echo 'ERROR: ' . $e->GetMessage();
		}
		
		session_start();
		$_SESSION['action'] = 'bid';
		header('Location: ../index.php?pag=subastas&id=' . $id);
	}