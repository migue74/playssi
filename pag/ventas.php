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
<h1><img src="img/icons/money.png" />Ventas <?php if ($nivel == 'Jefe' || $nivel == 'Director') { echo '<a class="add" href="#"><img src="img/icons/add.png" />Añadir venta</a>'; ?></h1>
<div class="addproduct">
	<fieldset>
		<legend>Añadir producto</legend>
		<form method="post" action="act/product_add.php">
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
<?php } else echo '</h1>'; ?>
<table>
	<tr>
		<th>ID</th>
		<th>Fecha</th>
		<th>Cliente</th>
		<th>Empleado</th>
		<th>Sucursal</th>
		<th>Productos</th>
		<th>Total</th>
	</tr>
</table>