<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Producto a�adido</div>';
		else if ($_SESSION['action'] == 'error')
			echo '<div class="error"><img src="img/icons/error.png" />�Error! Los datos introducidos son incorrectos</div>';
		else
			echo '<div class="ok"><img src="img/icons/accept.png" />Producto editado</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/brick.png" alt="Productos" />Productos 
<?php 
	if (!isset($_GET['id']) && $nivel == 'Jefe' || $nivel == 'Director')
		include('inc/productos/add.php');
		
	if (isset($_GET['id']))
		include('inc/productos/id.php');
	else
		include('inc/productos/todos.php');
?>