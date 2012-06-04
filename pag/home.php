<h1><img src="img/icons/chart_bar.png" />Estadísticas</h1>
<div class="boxes">
	<div class="box box3">
		<div class="line">
			<h2>Producto más vendido</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, e.nombre AS ednom, SUM(l.cantidad) AS sumcant, (p.precio * SUM(l.cantidad)) AS total 
						FROM productos p, lineasfacturas l, editores e
						WHERE p.id = l.id_producto
						AND p.id_editor = e.id
						GROUP BY p.id, p.nombre, p.precio, e.nombre
						ORDER BY sumcant DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<a class="image" href="?pag=productos&id=' . $row['ID'] . '">
						<span class="imagebox"><img src="img/prod/' . $row['ID'] . '.png" /></span>
						<h3>' . $row['NOMBRE'] . '</h3>
						<span class="editor">' . $row['EDNOM'] . '</span>
					</a>
					<div class="vert">
						<div class="numbox">
							<h4>Precio</h4>
							<span>' . formatnum($row['PRECIO']) . '</span>
							</div>
						<div class="numbox">
							<h4>Cantidad</h4>
							<span>' . formatnum($row['SUMCANT'], 0) . '</span>
							</div>
						<div class="numbox">
							<h4>Ingresos</h4>
							<span>' . formatnum($row['TOTAL']) . '</span>
						</div>
					</div>';
			}
		?>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Producto con más ingresos</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT p.id, p.nombre, p.precio, e.nombre AS ednom, SUM(l.cantidad) AS sumcant, (p.precio * SUM(l.cantidad)) AS total 
						FROM productos p, lineasfacturas l, editores e
						WHERE p.id = l.id_producto
						AND p.id_editor = e.id
						GROUP BY p.id, p.nombre, p.precio, e.nombre
						ORDER BY total DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<a class="image" href="?pag=productos&id=' . $row['ID'] . '">
						<span class="imagebox"><img src="img/prod/' . $row['ID'] . '.png" /></span>
						<h3>' . $row['NOMBRE'] . '</h3>
						<span class="editor">' . $row['EDNOM'] . '</span>
					</a>
					<div class="vert">
						<div class="numbox">
							<h4>Precio</h4>
							<span>' . formatnum($row['PRECIO']) . '</span>
							</div>
						<div class="numbox">
							<h4>Cantidad</h4>
							<span>' . formatnum($row['SUMCANT'], 0) . '</span>
							</div>
						<div class="numbox">
							<h4>Ingresos</h4>
							<span>' . formatnum($row['TOTAL']) . '</span>
						</div>
					</div>';
			}
		?>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Subasta más cara</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT *
						FROM ganadores_subastas
						ORDER BY cantidad DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<a class="image" href="?pag=subastas&id=' . $row['ID'] . '">
						<span class="imagebox"><img src="img/bids/' . $row['ID'] . '.png" /></span>
						<h3>' . $row['ARTICULO'] . '</h3>
						<span class="editor">' . $row['NOMBRE'] . '</span>
					</a>
					<div class="vert">
						<div class="numbox">
							<h4>Precio</h4>
							<span>' . formatnum($row['CANTIDAD']) . '</span>
						</div>
						<div class="numbox">
							<h4>Pujas</h4>
							<span>' . formatnum($row['NUMPUJAS'], 0) . '</span>
						</div>
						<div class="numbox">
							<h4>Fecha</h4>
							<span>' . formatdate($row['FECHA_FIN']) . '</span>
						</div>
					</div>';
			}
		?>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Empleado con más ingresos</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT e.id, e.nombre, e.nivel, SUM(f.total) AS sumfact, COUNT(f.id) AS numfact, AVG(f.total) AS media
						FROM empleados e, facturas f
						WHERE e.id = f.id_empleado
						GROUP BY e.id, e.nombre, e.nivel
						ORDER BY sumfact DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<div class="horiz">
						<div class="numbox">
							<h4>Ingresos</h4>
							<span>' . formatnum($row['SUMFACT']) . '</span>
						</div>
						<div class="numbox">
							<h4>Facturas</h4>
							<span>' . formatnum($row['NUMFACT'], 0) . '</span>
						</div>
						<div class="numbox">
							<h4>Media</h4>
							<span>' . formatnum($row['MEDIA']) . '</span>
						</div>
					</div>
					<a href="?pag=empleados&id=' . $row['ID'] . '">
						<h3>' . $row['NOMBRE'] . '</h3>
						<span class="editor">' . $row['NIVEL'] . '</span>
					</a>';
			}
		?>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Cliente con más gastos</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT c.id, c.nombre, c.poblacion, SUM(f.total) AS sumfact, COUNT(f.id) AS numfact, AVG(f.total) AS media
						FROM clientes c, facturas f
						WHERE c.id = f.id_cliente
						GROUP BY c.id, c.nombre, c.poblacion
						ORDER BY sumfact DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<div class="horiz">
						<div class="numbox">
							<h4>Gastos</h4>
							<span>' . formatnum($row['SUMFACT']) . '</span>
						</div>
						<div class="numbox">
							<h4>Facturas</h4>
							<span>' . formatnum($row['NUMFACT'], 0) . '</span>
						</div>
						<div class="numbox">
							<h4>Media</h4>
							<span>' . formatnum($row['MEDIA']) . '</span>
						</div>
					</div>
					<a href="?pag=clientes&id=' . $row['ID'] . '">
						<h3>' . $row['NOMBRE'] . '</h3>
						<span class="editor">' . $row['POBLACION'] . '</span>
					</a>';
			}
		?>
	</div>
	<div class="box box3">
		<div class="line">
			<h2>Factura más cara</h2>
		</div>
		<?php
			$sql = "SELECT * 
					FROM (SELECT f.id, f.total, f.fecha, e.nombre AS nomemp, c.nombre AS nomcli, COUNT(l.id) AS numprod
						FROM facturas f, empleados e, clientes c, lineasfacturas l
						WHERE f.id_empleado = e.id
						AND f.id_cliente = c.id
						AND l.id_factura = f.id
						GROUP BY f.id, f.total, f.fecha, e.nombre, c.nombre
						ORDER BY f.total DESC) 
					WHERE rownum = 1";
			$query = query($sql);
			foreach ($query as $row) {
				echo '<div class="horiz">
						<div class="numbox">
							<h4>Total</h4>
							<span>' . formatnum($row['TOTAL']) . '</span>
						</div>
						<div class="numbox">
							<h4>Productos</h4>
							<span>' . formatnum($row['NUMPROD'], 0) . '</span>
						</div>
						<div class="numbox">
							<h4>Fecha</h4>
							<span>' . formatdate($row['FECHA']) . '</span>
						</div>
					</div>
					<a href="?pag=ventas&id=' . $row['ID'] . '">
						<h3>Cliente: ' . $row['NOMCLI'] . '</h3>
						<span class="editor">Empleado: ' . $row['NOMEMP'] . '</span>
					</a>';
			}
		?>
	</div>
</div>