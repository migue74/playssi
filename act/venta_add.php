<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$cliente = $_POST['cliente'];
		$empleado = $_POST['empleado'];
		$producto = $_POST['producto'];
		$cantidad = $_POST['cantidad'];
		
		if ($cliente != '' && $empleado != '' && $producto != '' && is_numeric($cantidad)) {
				
			$sql = "INSERT INTO facturas (id, fecha, total, id_empleado, id_cliente)
					VALUES (sec_facturas.NEXTVAL, CURRENT_TIMESTAMP, 0, $empleado, $cliente)";
			
			try {
				$conex = new PDO($host, $username, $password);
				$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conex->query($sql);
				$stmt = $conex->query("SELECT sec_facturas.CURRVAL FROM dual");
				$conex = null;
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->GetMessage();
			}
			
			foreach ($stmt as $row) {
				$id = $row[0];
			}
			
			for ($i = 0, $l = 1; $i < count($producto); $i++) {
				$line = "INSERT INTO lineasfacturas (id, numero, cantidad, id_factura, id_producto)
						VALUES (sec_lineasfacturas.NEXTVAL, $l, {$cantidad[$i]}, $id, {$producto[$i]})";
				echo $line;
				query($line);
			}
			
			session_start();
			$_SESSION['action'] = 'add';
		} else {
			session_start();
			$_SESSION['action'] = 'error';
		}
		header('Location: ../index.php?pag=ventas');
	}