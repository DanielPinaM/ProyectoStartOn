<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php require("common/header.php")?>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Eventos::getInstance();
			$transfer = $SA->getElement($id);
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<div id="container">
		<div id="espacio"></div>
		<div id="perfil">
			<div class="descripcion">
				<?php
				echo '<img src= "/ProyectoStartOn/img/'.$transfer->getImagenEvento().'"  style="width:100%">';
				echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getFecha().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getCantidad().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getPrecio().'</p>';
				?>
			</div>
		</div>
	</div>
	<?php require("common/footer.php")?>	
</body>
</html>