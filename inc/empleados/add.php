<a class="action" href="#"><img src="img/icons/add.png" />A�adir empleado</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>A�adir empleado</legend>
		<form method="post" action="act/empl_add.php">
			<div class="client">
				<table>
					<tr>
						<td>Nombre:</td><td><input type="text" name="nombre" maxlength="50" /></td>
						<td>NIF:</td><td><input type="text" name="nif" maxlength="9" class="short" /></td>
					</tr>
					<tr>
						<td>Tel�fono:</td><td><input type="text" name="tlf" class="short" /></td>
						<td>Direcci�n:</td><td><input type="text" name="direccion" /></td>
					</tr>
					<tr>
						<td>Poblaci�n:</td><td><input type="text" name="poblacion" /></td>
						<td>C�digo Postal:</td><td><input type="text" name="cp" class="short" /></td>
					</tr>
					<tr>
						<td>Sucursal:</td><td><select name="sucursal">
							<?php
								$sql = "SELECT * FROM sucursales";
								$query = query($sql);
								foreach ($query as $row) {
									echo '<option value="' . $row['ID'] . '">' . $row['POBLACION'] . '</option>';
								}
							?>
						</td>
						<td>Contrase�a:</td><td><input type="password" name="passwd" class="short" /></td>
					</tr>
				</table>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>