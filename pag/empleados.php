<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Empleado a�adido</div>';
		else if ($_SESSION['action'] == 'error')
			echo '<div class="error"><img src="img/icons/error.png" />�Error! Los datos introducidos son incorrectos</div>';
		else
			echo '<div class="ok"><img src="img/icons/accept.png" />Empleado editado</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/user_gray.png" alt="Empleados" />Empleados
<?php
	if (!isset($_GET['id']) && $nivel == 'Jefe' || $nivel == 'Director')
		include('inc/empleados/add.php');
		
	if (isset($_GET['id']))
		include('inc/empleados/id.php');
	else
		include('inc/empleados/todos.php');
?>