</h1>
<div class="clients">
	<table>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>NIF</th>
			<th>E-Mail</th>
			<th>Teléfono</th>
			<th>Dirección</th>
			<th>Población</th>
			<th>CP</th>
		</tr>
		<?php
			$sql2 = "SELECT *
					FROM clientes
					ORDER BY nombre ASC";
			$query2 = query($sql2);
			foreach ($query2 as $row2) {
				echo '<tr>
						<td>' . $row2['ID'] . '</td>
						<td><a href="?pag=clientes&id=' . $row2['ID'] . '">' . $row2['NOMBRE'] . '</a></td>
						<td>' . $row2['NIF'] . '</td>
						<td>' . $row2['EMAIL'] . '</td>
						<td>' . $row2['TELEFONO'] . '</td>
						<td>' . $row2['DIRECCION'] . '</td>
						<td>' . $row2['POBLACION'] . '</td>
						<td>' . $row2['CP'] . '</td>
					</tr>';
			}
		?>
	</table>
</div>