<a class="action" href="#"><img src="img/icons/add.png" />Añadir venta</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Añadir venta</legend>
		<form method="post" action="act/venta_add.php">
			<div class="fixed">
				<label for="cliente">Cliente:</label> <select name="cliente" id="cliente">
						<?php
							$sql = "SELECT id, nombre FROM clientes ORDER BY nombre ASC";
							$query = query($sql);
							foreach ($query as $row) {
								echo '<option value="' . $row['ID'] . '">' . $row['NOMBRE'] . '</option>';
							}
						?>
					</select>
				<a href="#" class="add lower"><img src="img/icons/brick_add.png" />Añadir producto</a>
			</div>
			<div class="optional">
				<span>
					Producto: <select name="producto[]">
						<?php
							$sql = "SELECT id, nombre FROM productos ORDER BY nombre ASC";
							$query = query($sql);
							foreach ($query as $row) {
								echo '<option value="' . $row['ID'] . '">' . $row['NOMBRE'] . '</option>';
							}
						?>
					</select>
					Cantidad: <input type="text" name="cantidad[]" class="number" />
				</span>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>