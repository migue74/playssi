<?php
	if (!isset($_SESSION['user']['nivel']))
		$nivel = false;
	else
		$nivel = $_SESSION['user']['nivel'];
		
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Subasta a�adida</div>';
		else if ($_SESSION['action'] == 'error')
			echo '<div class="error"><img src="img/icons/error.png" />�Error! Los datos introducidos son incorrectos</div>';
		else
			echo '<div class="ok"><img src="img/icons/accept.png" />Puja a�adida</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/bell.png" alt="Subastas" />Subastas 
<?php 
	if (!isset($_GET['id']) && ($nivel == 'Encargado' || $nivel == 'Jefe' || $nivel == 'Director'))
		include('inc/subastas/add.php');
		
	if (isset($_GET['id']))
		include('inc/subastas/id.php');
	else
		include('inc/subastas/todos.php');
?>