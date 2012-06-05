<?php
	include('../inc/config.php');
	
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$tipo = $_POST['tipo'];
		$editor = $_POST['editor'];
		$newed = $_POST['neweditor'];
				
		if ($tipo == 'Juego') {
			$plataforma = $_POST['plataforma'];
			$genero = $_POST['genero'];
			$parental = $_POST['parental'];
			
			$sql2 = "INSERT INTO juegos (plataforma, genero, clas_parental, id_producto)
				VALUES ('$plataforma', '$genero', '$parental', sec_productos.CURRVAL)";
		} else if ($tipo == 'Consola') {
			$capacidad = $_POST['capacidad'];
			$sql2 = "INSERT INTO consolas (capacidad, id_producto)
				VALUES ($capacidad, sec_productos.CURRVAL)";
		} else {
			$tipoacc = $_POST['tipoacc'];
			$sql2 = "INSERT INTO accesorios (tipo, id_producto)
				VALUES ('$tipoacc', sec_productos.CURRVAL)";
		}
		
		if ($newed) {
			$sql1 = "INSERT INTO editores (id, nombre) VALUES (sec_editores.NEXTVAL, '$editor')";
			$sql = "INSERT INTO productos (id, nombre, precio, fecha, tipo, stock, id_editor)
				VALUES (sec_productos.NEXTVAL, '$nombre', '$precio', CURRENT_TIMESTAMP, '$tipo', 10, sec_editores.CURRVAL)";
		} else
			$sql = "INSERT INTO productos (id, nombre, precio, fecha, tipo, stock, id_editor)
					VALUES (sec_productos.NEXTVAL, '$nombre', '$precio', CURRENT_TIMESTAMP, '$tipo', 10, $editor)";
				
		try {
			$conex = new PDO($host, $username, $password);
			$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($newed) $stmt = $conex->query($sql1);
			$stmt = $conex->query($sql);
			$stmt = $conex->query($sql2);
			$conex->commit();
			$conex = null;
		} catch (PDOException $e) {
			echo 'ERROR: ' . $e->GetMessage();
		}
		header('Location: ../index.php?pag=productos');
	}