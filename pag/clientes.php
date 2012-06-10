<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Cliente añadido</div>';
		else
			echo '<div class="ok"><img src="img/icons/accept.png" />Cliente editado</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/user.png" />Clientes 
<?php
	if (!isset($_GET['id']) && $nivel == 'Jefe' || $nivel == 'Director')
		include('inc/clientes/add.php');
		
	if (isset($_GET['id']))
		include('inc/clientes/id.php');
	else
		include('inc/clientes/todos.php');
?>