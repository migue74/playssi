<a class="action" href="#"><img src="img/icons/add.png" />A�adir cliente</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>A�adir cliente</legend>
		<form method="post" action="act/client_add.php">
			<div class="client">
				<table>
					<tr>
						<td>Nombre:</td><td><input type="text" name="nombre" maxlength="50" /></td>
						<td>NIF:</td><td><input type="text" name="nif" maxlength="9" class="short" /></td>
					</tr>
					<tr>
						<td>E-Mail:</td><td><input type="text" name="email" /></td>
						<td>Tel�fono:</td><td><input type="text" name="tlf" class="short" /></td>
					</tr>
					<tr>
						<td>Direcci�n:</td><td><input type="text" name="direccion" /></td>
						<td>Poblaci�n:</td><td><input type="text" name="poblacion" /></td>
					</tr>
					<tr>
						<td>C�digo Postal:</td><td><input type="text" name="cp" class="short" /></td>
					</tr>
				</table>
			</div>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>