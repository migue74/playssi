<?php
	$sql = "SELECT *
			FROM clientes
			WHERE id = {$_GET['id']}";
	$query = query($sql);
	foreach ($query as $row) {
		echo '<img src="img/h1_sep.png" class="sep" /><img src="img/icons/user.png" alt="Imagen" />';
		echo $row['NOMBRE'];
		if ($nivel == 'Jefe' || $nivel == 'Director')
			include('inc/clientes/edit.php');
		else
			echo '</h1>';
	}
?>