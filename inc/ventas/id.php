<?php
	$sql = "SELECT id, nombre, tipo
			FROM productos
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		$tipo = $row['TIPO'];
		if ($tipo == 'Juego')
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/controller.png" />';
		else if ($tipo == 'Consola')
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/drive.png" />';
		else
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/joystick.png" />';
		echo $row['NOMBRE'];
		if ($nivel == 'Jefe' || $nivel == 'Director')
			include('inc/productos/edit.php');
		else
			echo '</h1>';
	}
	
	$sql = "SELECT p.id, p.nombre AS nomprod, p.fecha, p.precio, e.nombre AS nomed, t.*,
			NVL((SELECT SUM(cantidad) FROM lineasfacturas WHERE id_producto = p.id), 0) AS sumcant, 
			NVL((SELECT (precio * SUM(cantidad)) FROM productos pr, lineasfacturas WHERE pr.id = id_producto AND pr.id = p.id GROUP BY precio), 0) AS total
		FROM productos p, editores e, " . strtolower($tipo) . "s t
		WHERE p.id = {$_GET['id']}
		AND p.id_editor = e.id
		AND p.id = t.id_producto";
	$query = query($sql);
	foreach ($query as $row) {
?>
<div class="product">
	<div class="head">
		<div class="left">
			<div class="image">
				<img src="img/prod/<?php echo $row['ID']; ?>.png" />
			</div>
			<h2><?php echo $row['NOMPROD']; ?></h2>
			<div class="editor">
				<?php echo $row['NOMED']; ?>
			</div>
			<div class="precio">
				<h4>Precio</h4>
				<span><?php echo fzero($row['PRECIO']); ?></span>
			</div>
		</div>
		<div class="right">
			<div class="numbox">
				<h4>Ventas</h4>
				<span><?php echo fzero($row['SUMCANT']); ?></span>
			</div>
			<div class="numbox">
				<h4>Ingresos</h4>
				<span><?php echo fzero($row['TOTAL']); ?></span>
			</div>
			<div class="numbox">
				<h4>Fecha</h4>
				<span><?php echo fdate($row['FECHA']); ?></span>
			</div>
			<?php if ($tipo == 'Juego') { ?>
			<div class="numbox">
				<h4>Plataforma</h4>
				<span><?php echo $row['PLATAFORMA']; ?></span>
			</div>
			<div class="numbox">
				<h4>Género</h4>
				<span><?php echo $row['GENERO']; ?></span>
			</div>
			<div class="numbox">
				<h4 style="font-size: 10px">Clas. Parental</h4>
				<span><?php echo $row['CLAS_PARENTAL']; ?></span>
			</div>
			<?php } else if ($tipo == 'Consola') { ?>
			<div class="numbox">
				<h4>Capacidad</h4>
				<span><?php echo $row['CAPACIDAD']; ?></span>
			</div>
			<?php } else { ?>
			<div class="numbox">
				<h4>Tipo</h4>
				<span><?php echo $row['TIPO']; ?></span>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<div class="clients">
		<table>
			<tr>
				<th>Clientes que han comprado este producto</th>
				<th>Fecha</th>
				<th>Unidades</th>
				<th>Sucursal</th>
			</tr>
			<?php
				$sql2 = "SELECT c.nombre, f.fecha, l.cantidad, s.poblacion
						FROM clientes c, facturas f, lineasfacturas l, empleados e, sucursales s
						WHERE c.id = f.id_cliente
						AND f.id = l.id_factura
						AND f.id_empleado = e.id
						AND s.id = e.id_sucursal
						AND l.id_producto = {$_GET['id']}
						ORDER BY f.fecha DESC";
				$query2 = query($sql2);
				foreach ($query2 as $row2) {
					echo '<tr>
							<td>' . $row2['NOMBRE'] . '</td>
							<td>' . fdate($row2['FECHA'], true) . '</td>
							<td>' . $row2['CANTIDAD'] . '</td>
							<td>' . $row2['POBLACION'] . '</td>
						</tr>';
				}
			?>
		</table>
	</div>
</div>