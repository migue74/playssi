<a class="action" href="#"><img src="img/icons/add.png" />Añadir puja</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Añadir puja</legend>
		<form id="formulario" method="post" action="act/bid_add.php">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<div class="fixed">
				Cliente: <select name="cliente" id="cliente">
						<?php
							$sql2 = "SELECT id, nombre FROM clientes ORDER BY nombre ASC";
							$query2 = query($sql2);
							foreach ($query2 as $row2) {
								echo '<option value="' . $row2['ID'] . '">' . $row2['NOMBRE'] . '</option>';
							}
						?>
					</select>
				Cantidad: <input type="text" name="cantidad" class="number" />
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>