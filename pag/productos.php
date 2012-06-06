<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['add'])) {
		echo '<div class="ok"><img src="img/icons/accept.png" />Producto añadido</div>';
		unset($_SESSION['add']);
	}
?>
<h1><img src="img/icons/box.png" />Productos <?php if (!isset($_GET['id']) && $nivel == 'Jefe' || $nivel == 'Director') { echo '<a class="add" href="#"><img src="img/icons/add.png" />Añadir producto</a>'; ?></h1>
<div class="addproduct">
	<fieldset>
		<legend>Añadir producto</legend>
		<form method="post" action="act/product_add.php" enctype="multipart/form-data">
			<div class="fixed">
				<label for="nombre">Nombre:</label> <input type="text" name="nombre" maxlength="50" />
				<label for="precio">Precio:</label> <input type="text" name="precio" class="number" />
				<label for="editor">Editor:</label> <span id="editor"><select name="editor" style="width: 106px">
						<?php
							$sql = "SELECT id, nombre FROM editores ORDER BY nombre ASC";
							$query = query($sql);
							foreach ($query as $row) {
								echo '<option value="' . $row['ID'] . '">' . $row['NOMBRE'] . '</option>';
							}
						?>
					</select></span>
				<input id="checknew" type="checkbox" name="neweditor" /><label for="checknew">Nuevo</label>
				<div class="tipo"><label for="tipo">Tipo:</label> <select name="tipo" id="tipo" style="margin: 0">
						<option>Juego</option>
						<option>Consola</option>
						<option>Accesorio</option>
					</select></div>
			</div>
			<div class="upimage">
				Imagen: <input type="file" name="imagen" />
			</div>
			<div class="optional">
				<label for="plataforma">Plataforma:</label> <select name="plataforma" id="plataforma">
								<option>PC</option>
								<option>PS3</option>
								<option>Wii</option>
								<option>XBOX 360</option>
								<option>NDS</option>
								<option>PSP</option>
								<option>Móvil</option>
							</select>
				<label for="genero">Género:</label> <select name="genero" id="genero">
								<option>Acción</option>
								<option>Aventuras</option>
								<option>Deportes</option>
								<option>Lucha</option>
								<option>FPS</option>
								<option>RPG</option>
								<option>Simulación</option>
								<option>Estrategia</option>
								<option>Puzzle</option>
								<option>Plataformas</option>
								<option>Conducción</option>
							</select>
				<label for="parental">Clas. Parental:</label> <select name="parental" id="parental">
								<option>EC</option>
								<option>E</option>
								<option>E10+</option>
								<option>T</option>
								<option>M</option>
								<option>AO</option>
								<option>RP</option>
							</select>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>
<?php } if (isset($_GET['id'])) {
	$sql = "SELECT p.id, p.nombre, p.precio, p.tipo, NVL((SELECT SUM(cantidad) FROM lineasfacturas WHERE id_producto = p.id), 0) AS sumcant, 
											NVL((SELECT (precio * SUM(cantidad)) FROM productos pr, lineasfacturas WHERE pr.id = id_producto AND pr.id = p.id GROUP BY precio), 0) AS total
			FROM productos p
			WHERE p.tipo = 'Juego'
			AND p.id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		if ($row['TIPO'] == 'Juego')
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/controller.png" />';
		else if ($row['TIPO'] == 'Juego')
			echo '— <img src="img/icons/drive.png" />';
		else
			echo '— <img src="img/icons/joystick.png" />';
		echo $row['NOMBRE'];
	}
} else { echo '</h1>'; ?>
<div class="boxes">
	<div class="box box3">
		<div class="line">
			<h2>Juegos</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Juego'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 100";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td><a href="?pag=productos&id=' . $row['ID'] . '">' . $row['NOMBRE'] . '</a></td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Consolas</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Consola'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td>' . $row['NOMBRE'] . '</td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Accesorios</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Accesorio'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td>' . $row['NOMBRE'] . '</td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
</div>
<?php } ?>