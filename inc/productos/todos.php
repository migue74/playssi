</h1>
<div class="boxes">
	<div class="box box3">
		<div class="line">
			<h2>Juegos</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Juego'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 100";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td><a href="?pag=productos&amp;id=' . $row['ID'] . '">' . $row['NOMBRE'] . '</a></td>
						<td style="text-align: right">' . fzero($row['PRECIO']) . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Consolas</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Consola'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td><a href="?pag=productos&amp;id=' . $row['ID'] . '">' . $row['NOMBRE'] . '</a></td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Accesorios</h2>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th style="text-align: left">Nombre</th>
				<th>Precio</th>
				<th>Ventas</th>
				<th>Ingresos</th>
			</tr>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, NVL((SELECT SUM(cantidad) 
																FROM lineasfacturas 
																WHERE id_producto = p.id), 0) AS sumcant, 
															NVL((SELECT (precio * SUM(cantidad)) 
																FROM productos pr, lineasfacturas 
																WHERE pr.id = id_producto 
																AND pr.id = p.id 
																GROUP BY precio), 0) AS total
						FROM productos p
						WHERE p.tipo = 'Accesorio'
						ORDER BY sumcant DESC, total DESC, p.nombre ASC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td><a href="?pag=productos&amp;id=' . $row['ID'] . '">' . $row['NOMBRE'] . '</a></td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
</div>