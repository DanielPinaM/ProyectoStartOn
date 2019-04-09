<!DOCTYPE html>


<?php 
require_once ("../config.php");
include_once "../SA/SA_Usuario.php";
 ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="perfiles.css" />
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php
		require("includes/common/header.php");
	?>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){	
			$id = $_SESSION['id_usuario'];		
			$SA = SA_Usuario::getInstance();
			$transferUser = $SA->getElement($id);
		}
	?>

			<div id="perfil">
				<div id="card">
					<img src= "<?php echo $transferUser->getImagenPerfil(); ?>" alt= 'John' style="width:100%">
					<?php
					echo " <p id ='burbuja'> ".$transferUser->getNombre()."  ".$transferUser->getApellido()."</p>";
					echo " <p id ='burbuja'> ".$transferUser->getOficio()." </p>";
					echo " <p id ='burbuja'> ".$transferUser->getLocalizacion()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Carta de presentacion</h2>
					<hr />
					<?php
						echo "<p> ".$transferUser->getCartaPresentacion()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Experiencia</h2>
					<hr />
					<?php
						echo "<p> ".$transferUser->getExperiencia()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Pasiones</h2>
					<hr />
					<?php
						echo "<p> ".$transferUser->getPasiones()." </p>";
					?>
				</div>
				<a href="mod_perf.php" >Modificar perfil</button>
			</div>



			<!-- <button type ='button'  onclick="window.location = 'http://www.marca.com';"/> CV </button> -->
			<!-- poner el CV en vez de marca arriba, osea, window.open('curriculum.php', 'width=800,height=600') -->


			<?php
				require("includes/common/footer.php");
			?>
</body>
</html>
