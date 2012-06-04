<?php
	include('inc/config.php');
	include('inc/functions.php');
	session_start();
	
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
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/stuff.js"></script>
		<script type="text/javascript" src="js/jquery.color.js"></script>
		<script type="text/javascript" src="js/jquery-textFill-0.1.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="wrapper">
				<div class="logo">
					<img src="img/logo.png" />
				</div>
				<div class="user" id="user">
					<?php if (!isset($_SESSION['user'])) { ?>
					<form id="login" method="post" action="login.php" accept-charset="utf-8">
						<img src="img/icons/vcard.png" /><input type="text" id="nif" name="nif" /><label id="label_nif" for="nif">NIF</label>
						<img src="img/icons/key.png" /><input type="password" id="passwd" name="passwd" /><label id="label_passwd" for="passwd">Contraseña</label>
						<input type="submit" value="Enviar" />
					</form>
					<?php } else {
						echo '<div class="info">
								<img src="img/icons/user.png" /><strong>' . $_SESSION['user']['nombre'] . '</strong>
								<ul>
									<li><strong>Nivel:</strong> ' . $_SESSION['user']['nivel'] . '</li>';
						$sql = "SELECT NVL(SUM(f.total), 0) AS sumfact, COUNT(f.id) AS numfact, NVL(AVG(f.total), 0) AS media
								FROM empleados e, facturas f
								WHERE e.id = f.id_empleado
								AND e.id = {$_SESSION['user']['id']}";
						$query = query($sql);
						foreach ($query as $row) {
							echo '<li><strong>Ingresos:</strong> ' . $row['SUMFACT'] . ' €</li>
									<li><strong>Facturas:</strong> ' . $row['NUMFACT'] . '</li>
									<li><strong>Media:</strong> ' . $row['MEDIA'] . ' €</li>
								</ul>
							</div>
							<a class="logout" href="logout.php"><img src="img/icons/door_in.png" />Cerrar sesión</a>';
						}
					} ?>
				</div>
			</div>
			<div class="menu">
				<div class="wrapper">
					<ul>
						<li><a href="./" <?php echo activeTab('home'); ?>>Inicio</a></li>
						<li><a href="?pag=productos" <?php echo activeTab('productos'); ?>>Productos</a></li>
						<li><a href="?pag=ventas" <?php echo activeTab('ventas'); ?>>Ventas</a></li>
						<li><a href="?pag=clientes" <?php echo activeTab('clientes'); ?>>Clientes</a></li>
						<li><a href="?pag=empleados" <?php echo activeTab('empleados'); ?>>Empleados</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php if (!isset($_SESSION['user']) && !isset($_SESSION['error'])) { ?>
		<div class="alert-login">
			<p>
				<strong>Bienvenido a la web de administración de PlaySSI.</strong><br/>
				Por favor, inicie sesión para realizar cualquier gestión.
			</p>
			<a href="#" id="alert-login">Iniciar sesión</a>
		</div>
		<?php } else if (isset($_SESSION['error'])) { ?>
		<div class="alert-login">
			<img src="img/icons/alert_big.png" />
			<p>
				<strong>¡Ups! Los datos introducidos son incorrectos.</strong><br/>
				Por favor, inténtelo de nuevo.
			</p>
			<a href="#" id="alert-login">Iniciar sesión</a>
		</div>
		<?php session_destroy(); } ?>
		<div class="content">
			<div class="wrapper">
				<?php
					switch($pag) {
						case 'productos':
							include('pag/productos.php');
							break;
						case 'ventas':
							include('pag/ventas.php');
							break;
						case 'clientes':
							include('pag/clientes.php');
							break;
						case 'empleados':
							include('pag/empleados.php');
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