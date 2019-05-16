
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
        $listPorLikes = $SA->getTopTres();
        $cont = 1;

        echo '<div class="rankingcard">';
        while($cont < 4){
          $id =  $listPorLikes[$cont]->getId_Empresa();
          $nombre = $listPorLikes[$cont]->getNombre();
          $localizacion =  $listPorLikes[$cont]->getNombre();
          $img = $listPorLikes[$cont]->getImagenPerfil();

          echo '<div id= "card">' .$cont.'º';     //hay que hacer el css card en comon para la lista
						echo '<a href ="perfEmp.php?id='.$id.'" ><img src= "../'.$img.'"></a>';
						echo ' <p class="burbuja" id="btitulo"> '. $nombre. '</p>';
						echo '<p class="burbuja"> '. $localizacion. '</p>';
					echo'</div>';

          $cont = $cont +1;
        }
        echo '</div>';
     ?>
     </div>

    <div class="row" style="margin-top:30px">
    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
  </div>

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
						echo '<a href ="perfEmp.php?id='.$value->getId_Empresa().'" ><img src= "../'.$value->getImagenPerfil().'"  style="width:100%"></a>';
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
