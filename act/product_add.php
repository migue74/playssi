<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$tipo = $_POST['tipo'];
		$editor = $_POST['editor'];
		$newed = isset($_POST['neweditor']);
		$imagen = $_FILES['imagen']['name'];
				
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
		
		echo $sql2;
		
		try {
			$conex = new PDO($host, $username, $password);
			$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($newed) $stmt = $conex->query($sql1);
			$stmt = $conex->query($sql);
			$stmt = $conex->query($sql2);
			$stmt = $conex->query("SELECT sec_productos.CURRVAL FROM dual");
			$conex = null;
		} catch (PDOException $e) {
			echo 'ERROR: ' . $e->GetMessage();
		}
		
		foreach ($stmt as $row) {
			$idimg = $row[0];
		}
		
		$dimens = getimagesize($_FILES['imagen']['tmp_name']);
		$ratio = $dimens[0] / $dimens[1];
		$extension = explode('.', $imagen);
		$extension = $extension[count($extension)-1];
		
		if ($dimens[0] > 180 || $dimens[1] > 140) {
			$ancho = 180;
			$alto = $ancho / $ratio;
			if ($alto > 140)	{
				$alto = 140;
				$ancho = $alto * $ratio;
			}
			
			$mini = imagecreatetruecolor($ancho, $alto);
			
			if ($extension == 'jpg')
				$src = imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
			else if ($extension == 'png')
				$src = imagecreatefrompng($_FILES['imagen']['tmp_name']);
			else if ($extension == 'gif')
				$src = imagecreatefromgif($_FILES['imagen']['tmp_name']);
				
			imagecopyresampled($mini, $src, 0, 0, 0, 0, $ancho, $alto, $dimens[0], $dimens[1]);
			imagepng($mini, '../img/prod/' . $idimg . '.png', 0);
		}
		
		session_start();
		$_SESSION['add'] = true;
		//header('Location: ../index.php?pag=productos');
	}