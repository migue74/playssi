<?php
	include('../inc/config.php');
	include('../inc/functions.php');
	
	if ($_POST) {
		$articulo = $_POST['articulo'];
		$precio = $_POST['precio'];
		
		if ($articulo != '' && is_numeric($precio)) {
			$sql = "INSERT INTO subastas (id, articulo, precio_salida, fecha_inicio, fecha_fin)
					VALUES (sec_subastas.NEXTVAL, '$articulo', '$precio', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP+7)";
			
			try {
				$conex = new PDO($host, $username, $password);
				$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conex->query($sql);
				$stmt = $conex->query("SELECT sec_subastas.CURRVAL FROM dual");
				$conex = null;
			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->GetMessage();
			}
			
			foreach ($stmt as $row) {
				$id = $row[0];
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
				imagepng($mini, '../img/auct/' . $id . '.png', 9);
			}
			
			session_start();
			$_SESSION['action'] = 'add';
		} else {
			session_start();
			$_SESSION['action'] = 'error';
		}
		header('Location: ../index.php?pag=subastas');
	}