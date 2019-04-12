<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>

<body>
	<div id="cabecera">
	<ul>
		<li><a href="/ProyectoStartOn/index.php"><img id='logo_cabecera' src="/ProyectoStartOn/img/Logo1.png"></a>
		<li><a href="/ProyectoStartOn/vista/listEmpresa.php">Startups</a>
		<li><a href="/ProyectoStartOn/vista/listUser.php">Usuarios</a>
		<li><a href="">Eventos</a>
		<li><a href="/ProyectoStartOn/vista/conocenos.php">Conócenos</a>
		<li><a href="">Ayuda</a>
		<?php
			if(!$_SESSION['login'])
				echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoStartOn/vista/login.php">Inicia sesión</a>';
			else{
				echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoStartOn/vista/logout.php">Cerrar sesión</a>';
				if(isset($_SESSION['id_usuario']))
					echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoStartOn/vista/perfUser.php">Perfil</a>';
				else
					echo '<li style="float:right"><a id="inicio_sesion"  href="/ProyectoStartOn/vista/perfEmp.php">Perfil</a>';
			}
		?>
	</ul>
	</div
</body>
</html>
