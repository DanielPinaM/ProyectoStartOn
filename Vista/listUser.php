
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="container">
		<?php require("common/header.php")?>
		<div class="row">
			<?php
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
				foreach($ListOfUser as $value){
					/**
					echo '<pre>';
					var_dump($value->getImagenPerfil());
					echo '</pre>';

					*/
					//FALTA PONERSE DE ACUERDO DONDE SE VAN A AGUARDAR LAS FOTOS
	         echo '<div id= "card">';
						echo '<a href ="/ProyectoStartOn/vista/perfUser.php?id='.$value->getId_Usuario().'" ><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p> '. $value->getNombre(). '</p>';
						echo '<p> '. $value->getOficio(). '</p>';
						echo '<p> '. $value->getLocalizacion(). '</p>';
					echo'</div>';
				}
			?>
		</div>
		<?php require("common/footer.php")?>
	</div>
</body>
