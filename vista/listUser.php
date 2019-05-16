
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

    <div style="margin-top: 80px">

    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
    <a  id= "botonSubmit" class ="botonGuay" href="" >Crear evento</a>
  </div>
		<div class="row">
			<?php
				$SA = SA_Usuario::getInstance();
				$ListOfUser = $SA->getAllElements();
        $cont = 0;
				foreach($ListOfUser as $value){
					/*
					echo '<pre>';
					var_dump($value->getImagenPerfil());
					echo '</pre>';
					*/
          if(($cont % 4) == 0){
              echo '<div class = "row">';
          }
          echo '<div id= "card">';
           echo '<a ';
           if(isset($_SESSION['login']) && $_SESSION['login'])
            echo 'href ="perfUser.php?id='.$value->getId_Usuario().'"';
            echo '><img src= "../'.$value->getImagenPerfil().'"  style="width:100%"></a>';
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
		<?php require("common/footer.php")?>
	</div>
</body>
