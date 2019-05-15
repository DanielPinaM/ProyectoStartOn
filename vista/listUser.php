
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
<script>
function showListaOrdenada(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("contendor").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ordenacionListaEmpresa.php?q="+str, true);
  xhttp.send();
}
</script>

<body>
    <?php require("common/header.php")?>
    <div id="espacio"></div>
    <div style="margin-top: 80px">
      <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Oficio')" >Oficio</a>
      <a  id= "botonSubmit" class ="botonGuay"onclick="showListaOrdenada('Localizacion')">Localizacion</a>
  <div id="container">
		<div class="row">
			<?php
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
        $cont = 0;
				foreach($ListOfUser as $value){
          if(($cont % 4) == 0){
              echo '<div class = "row">';
          }
          echo '<div id= "card">';
           echo '<a ';
           if(isset($_SESSION['login']) && $_SESSION['login'])
            echo 'href ="/ProyectoStartOn/vista/perfUser.php?id='.$value->getId_Usuario().'"';
            echo '><img src= "/ProyectoStartOn/'.$value->getImagenPerfil().'"  style="width:100%"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $value->getNombre() .' '. $value->getApellido(). '</p>';
						echo '<p class="burbuja"> '. $value->getOficio(). '</p>';
						echo '<p class="burbuja"> '. $value->getLocalizacion(). '</p>';
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
	</div>
</body>
