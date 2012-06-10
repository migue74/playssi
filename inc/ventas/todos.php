</h1>
<div class="clients">
	<table>
		<tr>
			<th>Fecha</th>
			<th>Total</th>
			<th>Productos</th>
			<th>Cliente</th>
			<th>Empleado</th>
		</tr>
		<?php
			$sql2 = "SELECT f.fecha, f.total, COUNT(l.id) AS sumcant, c.id AS idcli, c.nombre AS nomcli, e.id AS idemp, e.nombre AS nomemp
					FROM facturas f, lineasfacturas l, clientes c, empleados e
					WHERE f.id = l.id_factura
					AND f.id_cliente = c.id
					AND f.id_empleado = e.id
					GROUP BY f.fecha, f.total, c.id, c.nombre, e.id, e.nombre
					ORDER BY f.fecha DESC";
			$query2 = query($sql2);
			foreach ($query2 as $row2) {
				echo '<tr>
						<td>' . fdate($row2['FECHA'], true) . '</td>
						<td>' . $row2['TOTAL'] . '</td>
						<td>' . $row2['SUMCANT'] . '</td>
						<td><a href="?pag=clientes&id=' . $row2['IDCLI'] . '">' . $row2['NOMCLI'] . '</a></td>
						<td><a href="?pag=empleados&id=' . $row2['IDEMP'] . '">' . $row2['NOMEMP'] . '</a></td>
					</tr>';
			}
		?>
	</table>
</div>