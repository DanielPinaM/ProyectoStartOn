
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
    <?php require("common/header.php")?>
	<div id="container">
		<div class="row">
			<?php
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
				foreach($ListOfUser as $value){
					/*
					echo '<pre>';
					var_dump($value->getImagenPerfil());
					echo '</pre>';

					*/
					//FALTA PONERSE DE ACUERDO DONDE SE VAN A AGUARDAR LAS FOTOS
	         echo '<div id= "card">';
           echo '<a ';
           if(isset($_SESSION['login']) && $_SESSION['login'])
            echo 'href ="/ProyectoStartOn/vista/perfUser.php?id='.$value->getId_Usuario().'"';
            echo '><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
						echo '<p class="burbuja"> '. $value->getOficio(). '</p>';
						echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
					echo'</div>';
				}
			?>
		</div>
		<?php require("common/footer.php")?>
	</div>
</body>
