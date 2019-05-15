<?php
    require_once ("../includes/config.php");
    require_once ("../logica/SA_Usuario.php");
    $seleccionOrdenada = $_GET['q'];

    $SA = SA_Usuario::getInstance();
    $ListOfEvents = $SA->getAllElementsById($seleccionOrdenada);
    $title = "";
    $lastTitle = "";
    foreach($ListOfEvents as $value) {
      if ($seleccionOrdenada == "Oficio") {
        $title = $value->getOficio();
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
        echo '<div id= "card">';
         echo '<a ';
        if(isset($_SESSION['login']) && $_SESSION['login'])
         echo 'href ="/ProyectoStartOn/vista/perfUser.php?id='.$value->getId_Usuario().'"';
         echo '><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
         echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre() .' '. $value->getApellido(). '</p>';
         echo '<p class="burbuja"> '. $value->getOficio(). '</p>';
         echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
    }
    if ($lastTitle != "") {
        echo'</div>';
    }
?>
