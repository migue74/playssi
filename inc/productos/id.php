<?php
	$sql = "SELECT id, nombre, tipo
			FROM productos
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		if ($row['TIPO'] == 'Juego')
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/controller.png" />';
		else if ($row['TIPO'] == 'Consola')
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/drive.png" />';
		else
			echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/joystick.png" />';
		echo $row['NOMBRE'];
		if ($nivel == 'Jefe' || $nivel == 'Director')
			include('inc/productos/edit.php');
		else
			echo '</h1>';
	}
	
	$sql = "SELECT p.id, p.nombre AS nomprod, p.precio, p.tipo, e.nombre AS nomed,
			NVL((SELECT SUM(cantidad) FROM lineasfacturas WHERE id_producto = p.id), 0) AS sumcant, 
			NVL((SELECT (precio * SUM(cantidad)) FROM productos pr, lineasfacturas WHERE pr.id = id_producto AND pr.id = p.id GROUP BY precio), 0) AS total
		FROM productos p, editores e
		WHERE p.id = {$_GET['id']}
		AND p.id_editor = e.id";
	$query = query($sql);
	foreach ($query as $row) {
?>
<div class="product">
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
<?php } ?>