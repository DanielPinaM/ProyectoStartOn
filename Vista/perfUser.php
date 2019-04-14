<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_usuario']))){
				$id = $_SESSION['id_usuario'];
				$SA = SA_Usuario::getInstance();
				$transferUser = $SA->getElement($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Usuario::getInstance();
			$transferUser = $SA->getElement($id);

			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Usuario::getInstance();
			$transferUser = $SA->getElement($id);

		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<?php require("common/header.php")?>

			<div id="perfil">
				<div id="card">
					<?php
          echo '<a href ="/ProyectoStartOn/vista/perfUser.php" ><img src= "/ProyectoStartOn/'.$transferUser->getImagenPerfil().'"  style="width:100%"></a>';
					echo " <p id ='burbuja'> ".$transferUser->getNombre()."  ".$transferUser->getApellido()."</p>";
					echo " <p id ='burbuja'> ".$transferUser->getOficio()." </p>";
					echo " <p id ='burbuja'> ".$transferUser->getLocalizacion()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Carta de presentacion</h2>
					<?php
						echo "<p> ".$transferUser->getCartaPresentacion()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Experiencia</h2>
					<?php
						echo "<p> ".$transferUser->getExperiencia()." </p>";
					?>
				</div>

				<div id="card">
					<h2>Pasiones</h2>
					<?php
						echo "<p> ".$transferUser->getPasiones()." </p>";
					?>
				</div>
				<?php
					if(isset($_SESSION['login']) && $_SESSION['login'] == true)
						if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_usuario'])))
							echo '<a  id= "botonSubmit" class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>';
				?>
			</div>

			<?php require("common/footer.php")?>
</body>
</html>
