<?php
	if (isset($_SESSION['action'])) {
		if ($_SESSION['action'] == 'add')
			echo '<div class="ok"><img src="img/icons/accept.png" />Venta añadida</div>';
		unset($_SESSION['action']);
	}
?>
<h1><img src="img/icons/money.png" />Ventas 
<?php
	if (isset($_SESSION['user']['nivel']))
		include('inc/ventas/add.php');
		
	include('inc/ventas/todos.php');
?>