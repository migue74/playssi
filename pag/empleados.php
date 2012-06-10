<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Empleado añadido</div>';
		else
			echo '<div class="ok"><img src="img/icons/accept.png" />Empleado editado</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/user_gray.png" />Empleados
<?php
	if (!isset($_GET['id']) && $nivel == 'Jefe' || $nivel == 'Director')
		include('inc/empleados/add.php');
		
	if (isset($_GET['id']))
		include('inc/empleados/id.php');
	else
		include('inc/empleados/todos.php');
?>