<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$tipo = $_POST['tipo'];
		$editor = $_POST['editor'];
		$newed = isset($_POST['neweditor']);
				
		if ($tipo == 'Juego') {
			$plataforma = $_POST['plataforma'];
			$genero = $_POST['genero'];
			$parental = $_POST['parental'];
			
			$sql2 = "UPDATE juegos SET plataforma = '$plataforma', genero = '$genero', clas_parental = '$parental' WHERE id_producto = $id";
		} else if ($tipo == 'Consola') {
			$capacidad = $_POST['capacidad'];
			$sql2 = "UPDATE consolas SET capacidad = '$capacidad' WHERE id_producto = $id";
		} else {
			$tipoacc = $_POST['tipoacc'];
			$sql2 = "UPDATE accesorios SET tipo = '$tipoacc' WHERE id_producto = $id";
		}
		
		if ($newed) {
			$sql1 = "INSERT INTO editores (id, nombre) VALUES (sec_editores.NEXTVAL, '$editor')";
			$sql = "UPDATE productos SET nombre = '$nombre', precio = '$precio', tipo = '$tipo', id_editor = sec_editores.CURRVAL WHERE id = $id";
		} else
			$sql = "UPDATE productos SET nombre = '$nombre', precio = '$precio', tipo = '$tipo', id_editor = '$editor' WHERE id = $id";
		
		try {
			$conex = new PDO($host, $username, $password);
			$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if ($newed) $stmt = $conex->query($sql1);
			$stmt = $conex->query($sql);
			$stmt = $conex->query($sql2);
			$conex = null;
		} catch (PDOException $e) {
			echo 'ERROR: ' . $e->GetMessage();
		}
		
		if (isset($_FILES['imagen']['tmp_name'])) {
			$img = $_FILES['imagen']['tmp_name'];
			$img_name = $_FILES['imagen']['name'];
		} else {
			$img = $_POST['imagen'];
			$img_name = $_POST['imagen'];
		}
		
		$dimens = getimagesize($img);
		$ratio = $dimens[0] / $dimens[1];
		$extension = explode('.', $img_name);
		$extension = $extension[count($extension)-1];
		
		if ($dimens[0] > 180 || $dimens[1] > 140) {
			$ancho = 180;
			$alto = $ancho / $ratio;
			if ($alto > 140)	{
				$alto = 140;
				$ancho = $alto * $ratio;
			}
			
			$mini = imagecreatetruecolor($ancho, $alto);
			
			if ($extension == 'jpg' || $extension == 'jpeg')
				$src = imagecreatefromjpeg($img);
			else if ($extension == 'png')
				$src = imagecreatefrompng($img);
			else if ($extension == 'gif')
				$src = imagecreatefromgif($img);
				
			imagecopyresampled($mini, $src, 0, 0, 0, 0, $ancho, $alto, $dimens[0], $dimens[1]);
			imagepng($mini, '../img/prod/' . $id . '.png', 9);
		}
		
		session_start();
		$_SESSION['action'] = 'edit';
		header('Location: ../index.php?pag=productos&id=' . $id);
	}