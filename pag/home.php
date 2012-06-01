<h1><img src="img/icons/chart_bar.png" />Estadísticas</h1>
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
			echo '<a class="image" href="?pag=producto&id=' . $row['ID'] . '">
					<img src="img/prod/' . $row['ID'] . '.png" />
					<h3>' . $row['NOMBRE'] . '</h3>
					<span class="editor">' . $row['EDNOM'] . '</span>
				</a>
				<div>
					<div class="numbox">
						<h4>Precio</h4>
						<span>' . fNum($row['PRECIO']) . '</span>
						</div>
					<div class="numbox">
						<h4>Cantidad</h4>
						<span>' . fNum($row['SUMCANT'], 0) . '</span>
						</div>
					<div class="numbox">
						<h4>Ingresos</h4>
						<span>' . fNum($row['TOTAL']) . '</span>
					</div>
				</div>';
		}
	?>
</div>
<div class="box box3">
	<div class="line">
		<h2>Producto con más ingresos</h2>
	</div>
	<div class="info">
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
			echo '<a class="image" href="?pag=producto&id=' . $row['ID'] . '">
					<img src="img/prod/' . $row['ID'] . '.png" />
					<h3>' . $row['NOMBRE'] . '</h3>
					<span class="editor">' . $row['EDNOM'] . '</span>
				</a>
				<div>
					<div class="numbox">
						<h4>Precio</h4>
						<span>' . fNum($row['PRECIO']) . '</span>
						</div>
					<div class="numbox">
						<h4>Cantidad</h4>
						<span>' . fNum($row['SUMCANT'], 0) . '</span>
						</div>
					<div class="numbox">
						<h4>Ingresos</h4>
						<span>' . fNum($row['TOTAL']) . '</span>
					</div>
				</div>';
		}
	?>
	</div>
</div>
<div class="box box3">
	<div class="line">
		<h2>Producto más vendido</h2>
	</div>
	asdf
</div>