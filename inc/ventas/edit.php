<?php
	$sql = "SELECT id, nombre, precio, tipo, id_editor
			FROM productos
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		$tipo = $row['TIPO'];
?>
<a href="#" class="action"><img src="img/icons/pencil.png" />Editar</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Editar producto</legend>
		<form method="post" action="act/product_edit.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<div class="fixed">
				<label for="nombre">Nombre:</label> <input type="text" name="nombre" maxlength="50" value="<?php echo $row['NOMBRE']; ?>" />
				<label for="precio">Precio:</label> <input type="text" name="precio" class="number" value="<?php echo $row['PRECIO']; ?>" />
				<label for="editor">Editor:</label> <span id="editor"><select name="editor" style="width: 106px">
						<?php
							$sql2 = "SELECT id, nombre FROM editores ORDER BY nombre ASC";
							$query2 = query($sql2);
							foreach ($query2 as $row2) {
								echo '<option ' . selected($row['ID_EDITOR'], $row2['ID']) . ' value="' . $row2['ID'] . '">' . $row2['NOMBRE'] . '</option>';
							}
						?>
					</select></span>
				<input id="checknew" type="checkbox" name="neweditor" /><label for="checknew">Nuevo</label>
				<div class="tipo">
					<label for="tipo">Tipo:</label> <select name="tipo" id="tipo" style="margin: 0">
						<option>Juego</option>
						<option>Consola</option>
						<option>Accesorio</option>
					</select>
					<script language="javascript">
						$("#tipo").val("<?php echo $tipo; ?>");
					</script>
				</div>
			</div>
			<span class="upimage">
				Imagen: <input type="file" name="imagen" id="imagen" />
			</span>
			<input id="checkurl" type="checkbox" name="imgurl" /><label for="checkurl">URL</label>
			<?php } ?>
			<div class="optional">
				<?php
					$sql = "SELECT * FROM " . strtolower($tipo) . "s WHERE id_producto = {$_GET['id']}";
					$query = query($sql);
					foreach ($query as $row) {
						if ($tipo == 'Juego') {
							echo '<label for="plataforma">Plataforma:</label> <select name="plataforma" id="plataforma">
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
								<script language="javascript">
									$("#plataforma").val("' . $row['PLATAFORMA'] . '");
									$("#genero").val("' . $row['GENERO'] . '");
									$("#parental").val("' . $row['CLAS_PARENTAL'] . '");
								</script>';
						} else if ($tipo == 'Consola')
							echo '<label for="capacidad">Capacidad:</label> <input type="text" name="capacidad" class="number" value="' . $row['CAPACIDAD'] . '" />';
						else
							echo '<label for="tipoacc">Tipo de accesorio:</label> <select name="tipoacc" id="tipoacc">
									<option>Mando</option>
									<option>Volante</option>
									<option>Funda</option>
									<option>Auriculares</option>
									<option>Memoria</option>
									<option>Cable</option>
									<option>Otros</option>
								</select>
								<script language="javascript">
									$("#tipoacc").val("' . $row['TIPO'] . '");
								</script>';
					}
				?>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>