<?php
	$sql = "SELECT e.*, s.id AS idsuc, s.poblacion AS pobsuc
			FROM empleados e, sucursales s
			WHERE e.id_sucursal = s.id
			AND e.id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
?>
<a href="#" class="action"><img src="img/icons/pencil.png" />Editar</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Editar empleado</legend>
		<form method="post" action="act/empl_edit.php">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<div class="client">
				<table>
					<tr>
						<td>Nombre:</td><td><input type="text" name="nombre" maxlength="50" value="<?php echo $row['NOMBRE']; ?>" /></td>
						<td>NIF:</td><td><input type="text" name="nif" maxlength="9" class="short" value="<?php echo $row['NIF']; ?>" /></td>
					</tr>
					<tr>
						<td>Teléfono:</td><td><input type="text" name="tlf" class="short" value="<?php echo $row['TELEFONO']; ?>" /></td>
						<td>Dirección:</td><td><input type="text" name="direccion" value="<?php echo $row['DIRECCION']; ?>" /></td>
					</tr>
					<tr>
						<td>Población:</td><td><input type="text" name="poblacion" value="<?php echo $row['POBLACION']; ?>" /></td>
						<td>Código Postal:</td><td><input type="text" name="cp" class="short" value="<?php echo $row['CP']; ?>" /></td>
					</tr>
					<tr>
						<td>Sucursal:</td><td><select name="sucursal" id="sucursal">
							<?php
								$sql2 = "SELECT * FROM sucursales";
								$query2 = query($sql2);
								foreach ($query2 as $row2) {
									echo '<option value="' . $row2['ID'] . '">' . $row2['POBLACION'] . '</option>';
								}
							?>
							</select>
							<script language="javascript">
								$("#sucursal").val("<?php echo $row['IDSUC']; ?>");
							</script>
						</td>
						<td>Contraseña:</td><td><input type="password" name="passwd" class="short" /></td>
					</tr>
				</table>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>
<?php } ?>