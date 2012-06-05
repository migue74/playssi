<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
?>
<h1><img src="img/icons/box.png" />Productos <?php if ($nivel == 'Jefe' || $nivel == 'Director') { echo '<a class="add" href="#"><img src="img/icons/add.png" />Añadir producto</a>'; ?></h1>
<fieldset class="addproduct">
	<legend>Añadir producto</legend>
	<form method="post" action="act/product_add.php">
		<label for="nombre">Nombre:</label> <input type="text" name="nombre" maxlength="50" />
		<label for="precio">Precio:</label> <input type="text" name="precio" class="number" />
		<label for="editor">Editor:</label> <span id="editor"><select name="editor">
				<?php
					$sql = "SELECT id, nombre FROM editores ORDER BY nombre ASC";
					$query = query($sql);
					foreach ($query as $row) {
						echo '<option value="' . $row['ID'] . '">' . $row['NOMBRE'] . '</option>';
					}
				?>
			</select></span>
		<input id="checknew" type="checkbox" name="neweditor" />Nuevo
		<label for="tipo" style="margin: 0 0 0 40px">Tipo:</label> <select name="tipo" id="tipo" style="margin: 0">
				<option>Juego</option>
				<option>Consola</option>
				<option>Accesorio</option>
			</select>
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
<?php } else echo '</h1>'; ?>
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