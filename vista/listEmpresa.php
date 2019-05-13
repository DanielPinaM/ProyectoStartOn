
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
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
				$SA = SA_Empresa::getInstance();
				$ListOfEmp = $SA->getAllElements();
        $cont = 0;
				foreach($ListOfEmp as $value){
          if(($cont % 4) == 0){
              echo '<div class = "row">';
          }
					echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
						echo '<a href ="/ProyectoStartOn/vista/perfEmp.php?id='.$value->getId_Empresa().'" ><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
						echo '<p class="burbuja"> '. $value->getFase(). '</p>';
						echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
						echo '<p class="burbuja" id="btexto"> '. $value->getCartaPresentacion(). '</p>';
					echo'</div>';
          if(($cont % 4) == 3){
              echo '</div>';
          }
          $cont += 1;
				}
			?>
		</div>
	</div>
  		<?php require("common/footer.php")?>
</body>
