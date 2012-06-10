<a class="action" href="#"><img src="img/icons/add.png" />Añadir venta</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Añadir venta</legend>
		<form id="formulario" method="post" action="act/venta_add.php">
			<input type="hidden" name="empleado" value="<?php echo $_SESSION['user']['id']; ?>" />
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
				Total: <input type="text" id="total" class="number" readonly="readonly" />
				<a href="#" class="add lower"><img src="img/icons/brick_add.png" />Añadir producto</a>
			</div>
			<div class="optional">
				<span>
					Producto: <select name="producto[]" id="producto">
						<?php
							$sql = "SELECT id, nombre, precio FROM productos ORDER BY nombre ASC";
							$query = query($sql);
							foreach ($query as $row) {
								echo '<option value="' . $row['ID'] . '" data-precio="' . $row['PRECIO'] . '">' . $row['NOMBRE'] . '</option>';
							}
						?>
					</select>
					Cantidad: <input type="text" name="cantidad[]" class="number" id="cantidad" />
				</span>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>