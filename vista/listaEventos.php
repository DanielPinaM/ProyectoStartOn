
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
<script>
function showListaOrdenada(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("container2").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("container2").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ordenacionListaEventos.php?q="+str, true);
  xhttp.send();
}

function showSugerencia(str) {
    if (str.length == 0) {
        document.getElementById("container2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("container2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "filtrarListaEventos.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<body>
  <?php require("common/header.php")?>
  <div class = container>
      <div class="row" style="margin-top:80px;">
        <?php
        $SA = SA_Eventos::getInstance();
        $ListOfEv = $SA->getAllElements();
        shuffle($ListOfEv);
        $i = 0;
        $size = sizeof($ListOfEv) / 2;
          echo '<div class="rankingcard">';
          while($i < 5) {
            $value = $ListOfEv[$i];
            echo '<div id= "card">';
                echo '<a href ="perfEvento.php?id='.$value->getNombre().'" "><img src= "../img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
            echo'</div>';
            $i+=1;
          }
          echo '</div>';
      ?>
      </div>
      <div class = row >
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Fecha')" >Fecha</a>
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Localizacion')" >Localizacion</a>
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Precio')" >Precio</a>
        <input type="text" class="campo-form" onkeyup="showSugerencia(this.value)"></p>
    </div>

	<div id="container2">
    <?php
      $SA = SA_Eventos::getInstance();
      $ListOfEv = $SA->getAllElements();
      $cont = 0;
      foreach($ListOfEv as $value){
        if(($cont % 4) == 0){
            echo '<div class = "row">';
        }
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<a href ="perfEvento.php?id='.$value->getNombre().'" "><img src= "../img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
          echo '<p class="burbuja" id="btitulo"> '. $value->getNombre(). '</p>';
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
