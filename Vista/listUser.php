
<?php 
require_once __DIR__'../includes/config.php';
require_once __DIR__'../patrones/SA_Usuario.php';
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
		<?php require __DIR__'common/header.php'?>
		<div class="row">
			<?php	
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
				foreach($ListOfUser as $value){
					/**
					echo '<pre>';
					var_dump($value->getImagenPerfil());
					echo '</pre>';
					echo '<div id= "card">';
					*/
					//FALTA PONERSE DE ACUERDO DONDE SE VAN A AGUARDAR LAS FOTOS

						echo '<img src = '. $value->getImagenPerfil() .'alt = "Foto de perfil" style="width:100%">';
						echo ' <p> '. $value->getNombre(). '</p>';
						echo '<p> '. $value->getOficio(). '</p>';
						echo '<p> '. $value->getLocalizacion(). '</p>';
					echo'</div>';
				}
			?>
		</div>
		<?php require __DIR__'common/footer.php'?>
	</div>
</body>