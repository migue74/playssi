<?php
	$sql = "SELECT *
			FROM clientes
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
?>
</h1>
<div class="prodaction" style="display: inline">
	<fieldset>
		<legend>Editar cliente</legend>
		<form id="formulario" method="post" action="act/client_edit.php">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<div class="client">
				<table>
					<tr>
						<td>Nombre:</td><td><input type="text" name="nombre" maxlength="50" value="<?php echo $row['NOMBRE']; ?>" /></td>
						<td>NIF:</td><td><input type="text" name="nif" maxlength="9" class="short" value="<?php echo $row['NIF']; ?>" id="nif" /></td>
					</tr>
					<tr>
						<td>E-Mail:</td><td><input type="text" id="email" name="email" value="<?php echo $row['EMAIL']; ?>" /></td>
						<td>Teléfono:</td><td><input type="text" name="tlf" class="short" value="<?php echo $row['TELEFONO']; ?>" /></td>
					</tr>
					<tr>
						<td>Dirección:</td><td><input type="text" name="direccion" value="<?php echo $row['DIRECCION']; ?>" /></td>
						<td>Población:</td><td><input type="text" name="poblacion" value="<?php echo $row['POBLACION']; ?>" /></td>
					</tr>
					<tr>
						<td>Código Postal:</td><td><input type="text" name="cp" class="short" value="<?php echo $row['CP']; ?>" /></td>
					</tr>
				</table>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>
<?php }?>