<?php
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Venta añadida</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/money.png" />Ventas 
<?php 
	include('inc/ventas/add.php');
		
	if (isset($_GET['id']))
		include('inc/ventas/id.php');
	else
		include('inc/ventas/todos.php');
?>