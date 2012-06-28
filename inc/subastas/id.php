<?php
	$sql = "SELECT *
			FROM subastas
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		echo '<img src="img/h1_sep.png" class="sep" alt="Imagen" /><img src="img/icons/bell.png" alt="Imagen" />';
		echo $row['ARTICULO'];
		if ($nivel == 'Encargado' || $nivel == 'Jefe' || $nivel == 'Director') {
			echo '<a class="action" href="act/auction_del.php?id=' . $_GET['id'] . '"><img src="img/icons/delete.png" alt="Imagen" />Eliminar</a></h1>';
			if ($row['FECHA_FIN'] > date('d/m/y H:i:s,u'))
				include('inc/subastas/bid.php');
		} else
			echo '</h1>';
?>
<div class="product">
	<div class="head">
		<div class="left">
			<div class="image">
				<img src="img/auct/<?php echo $row['ID']; ?>.png" alt="Imagen" />
			</div>
			<h2><?php echo $row['ARTICULO']; ?></h2>
			<div class="editor">
				Fin: <?php echo fdate($row['FECHA_FIN'], true); ?>
			</div>
			<div class="precio">
				<h4>Precio</h4>
				<span><?php echo fzero($row['PRECIO_SALIDA']); ?></span>
			</div>
		</div>
		<div class="right">
			<div class="numbox">
				<h4>Fecha inicio</h4>
				<span><?php echo fdate($row['FECHA_INICIO']); ?></span>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="clients">
		<table>
			<tr>
				<th>Pujas</th>
				<th>Fecha</th>
				<th>Cantidad</th>
			</tr>
			<?php
				$sql2 = "SELECT c.id, c.nombre, p.fecha, p.cantidad
						FROM clientes c, pujas p
						WHERE c.id = p.id_cliente
						AND p.id_subasta = {$_GET['id']}
						ORDER BY p.cantidad DESC";
				$query2 = query($sql2);
				foreach ($query2 as $row2) {
					echo '<tr>
							<td><a href="?pag=clientes&id=' . $row2['ID'] . '">' . $row2['NOMBRE'] . '</a></td>
							<td>' . fdate($row2['FECHA'], true) . '</td>
							<td>' . $row2['CANTIDAD'] . '</td>
						</tr>';
				}
			?>
		</table>
	</div>
</div>