<h1><img src="img/icons/box.png" />Productos</h1>
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
					FROM (SELECT p.id, p.nombre, p.precio, SUM(l.cantidad) AS sumcant, (p.precio * SUM(l.cantidad)) AS total 
						FROM productos p, lineasfacturas l
						WHERE p.id = l.id_producto
						AND p.tipo = 'Juego'
						GROUP BY p.id, p.nombre, p.precio
						ORDER BY sumcant DESC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td>' . $row['NOMBRE'] . '</td>
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
					FROM (SELECT p.id, p.nombre, p.precio, SUM(l.cantidad) AS sumcant, (p.precio * SUM(l.cantidad)) AS total 
						FROM productos p, lineasfacturas l
						WHERE p.id = l.id_producto
						AND p.tipo = 'Consola'
						GROUP BY p.id, p.nombre, p.precio
						ORDER BY sumcant DESC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td>' . $row['NOMBRE'] . '</td>
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
					FROM (SELECT p.id, p.nombre, p.precio, SUM(l.cantidad) AS sumcant, (p.precio * SUM(l.cantidad)) AS total 
						FROM productos p, lineasfacturas l
						WHERE p.id = l.id_producto
						AND p.tipo = 'Accesorio'
						GROUP BY p.id, p.nombre, p.precio
						ORDER BY sumcant DESC) 
					WHERE rownum <= 20";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<tr>
						<td style="text-align: center">' . $row['ID'] . '</td>
						<td>' . $row['NOMBRE'] . '</td>
						<td style="text-align: right">' . $row['PRECIO'] . '</td>
						<td style="text-align: right">' . $row['SUMCANT'] . '</td>
						<td style="text-align: right">' . $row['TOTAL'] . '</td>
					</tr>';
			}
		?>
		</table>
	</div>
</div>