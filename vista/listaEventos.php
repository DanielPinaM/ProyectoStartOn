
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
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
	<?php
      $SA = SA_Eventos::getInstance();
      $ListOfEvents = $SA->getAllElements();
      $cont = 0;
      foreach($ListOfEvents as $value){
        if(($cont % 4) == 0){
            echo '<div class = "row">';
        }
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<a href ="/ProyectoStartOn/vista/perfEvento.php" ><img src= "/ProyectoStartOn/img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
          echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
          echo '<p class="burbuja"> '. $value->getFecha(). '</p>';
          echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
          echo '<p class="burbuja"> '. $value->getCantidad(). '</p>';
        echo'</div>';
        if(($cont % 4) == 3){
            echo '</div>';
        }
        $cont += 1;
      }
    ?>

	</div>
  <?php require("common/footer.php")?>
</body>

<!-- test -->
