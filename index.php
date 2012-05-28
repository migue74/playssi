<?php
	include('inc/config.php');
	include('inc/functions.php');
	if (!isset($_GET['pag']))
		$pag = 'home';
	else
		$pag = $_GET['pag'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1" />
		<meta http-equiv="content-language" content="es" />
		<title>PlaySSI - Backend</title>
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
		<script src="js/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					PlaySSI
				</div>
			</div>
			<div class="menu">
				<div class="wrapper">
					<ul>
						<li><a href="./" <?php echo activeTab('home'); ?>>Inicio</a></li>
						<li><a href="?pag=clientes" <?php echo activeTab('clientes'); ?>>Clientes</a></li>
						<li><a href="?pag=productos" <?php echo activeTab('productos'); ?>>Productos</a></li>
						<li><a href="?pag=ventas" <?php echo activeTab('ventas'); ?>>Ventas</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="wrapper">
				<?php
					switch($pag) {
						case 'clientes':
							include('pag/clientes.php');
							break;
						case 'productos':
							include('pag/productos.php');
							break;
						case 'ventas':
							include('pag/ventas.php');
							break;
						default:
							include('pag/home.php');
							break;
					}
				?>
			</div>
		</div>
	</body>
</html>