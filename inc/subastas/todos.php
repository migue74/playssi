</h1>
<div class="boxes">
	<div class="box box2">
		<div class="line">
			<h2>Abiertas</h2>
		</div>
		<table>
			<tr>
				<th>Artículo</th>
				<th>Fecha inicio</th>
				<th>Fecha fin</th>
				<th>Precio salida</th>
			</tr>
		<?php
			$sql = "SELECT *
					FROM subastas
					WHERE fecha_fin > CURRENT_TIMESTAMP
					ORDER BY fecha_fin DESC";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td><a href="?pag=subastas&id=' . $row['ID'] . '">' . $row['ARTICULO'] . '</a></td>
						<td style="text-align: right">' . fdate($row['FECHA_INICIO'], true) . '</td>
						<td style="text-align: right">' . fdate($row['FECHA_FIN'], true) . '</td>
						<td style="text-align: right">' . $row['PRECIO_SALIDA'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
	<div class="box box2">
		<div class="line">
			<h2>Finalizadas</h2>
		</div>
		<table>
			<tr>
				<th>Artículo</th>
				<th>Ganador</th>
				<th>Fecha</th>
				<th>Precio</th>
				<th>Pujas</th>
			</tr>
		<?php
			$sql = "SELECT *
					FROM ganadores_subastas
					WHERE fecha_fin < CURRENT_TIMESTAMP
					ORDER BY fecha_fin DESC";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td><a href="?pag=subastas&id=' . $row['ID'] . '">' . $row['ARTICULO'] . '</a></td>
						<td>' . $row['NOMBRE'] . '</td>
						<td style="text-align: right">' . fdate($row['FECHA_FIN'], true) . '</td>
						<td style="text-align: right">' . $row['CANTIDAD'] . '</td>
						<td style="text-align: right">' . $row['NUMPUJAS'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
</div>