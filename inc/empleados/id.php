<?php
	$sql = "SELECT e.*, s.poblacion AS pobsuc
			FROM empleados e, sucursales s
			WHERE e.id_sucursal = s.id
			AND e.id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/user_gray.png" alt="Imagen" />';
		echo $row['NOMBRE'];
		if ($nivel == 'Jefe' || $nivel == 'Director')
			include('inc/empleados/edit.php');
		else
			echo '</h1>';
	}
?>