<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Eventos.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Eventos::getInstance();
    $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
    $title = "";
    $lastTitle = "";
    foreach($ListOfEvents as $value) {
      if ($seleccionOrdenada == "Fecha") {
        $title = $value->getFecha();
      } else if ($seleccionOrdenada == "Precio") {
        $title = $value->getPrecio();
      } else if ($seleccionOrdenada == "Localizacion") {
        $title = $value->getLocalizacion();
      }
      if ($lastTitle != $title) {
        if ($lastTitle != "") {
            echo'</div>';
        }
        echo '<div class = "row">';
        $lastTitle = $title;
        echo '<h2>'.$lastTitle.'</h2>';
        }
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<a href ="/ProyectoStartOn/vista/perfEvento.php?id='.$value->getNombre().'" "><img src= "/ProyectoStartOn/img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
          echo '<p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
          echo '<p class="burbuja"> '. $value->getFecha(). '</p>';
          echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
          echo '<p class="burbuja"> '. $value->getCantidad(). '</p>';
        echo'</div>';
    }
    if ($lastTitle != "") {
        echo'</div>';
    }
?>
