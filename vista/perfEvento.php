<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
require_once ("../logica/SA_Comentario.php");
require_once ("../logica/SA_Usuario.php");
require_once ("../logica/transferComentario.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php require("common/header.php")?>

<?php
if(isset($_POST['delete'])){
		$nombreEvento = $_POST['delete'];
		$idUser = $_SESSION['id_usuario'];

		$SA_Comentario = SA_Comentario::getInstance();
		$SA_Comentario->deleteElement($nombreEvento, $idUser);

	}
 ?>

	<?php
		if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["id"]){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Eventos::getInstance();
			$transfer = $SA->getElement($id);
		}
		else{
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Eventos::getInstance();
			$transfer = $SA->getElement($id);
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>
	<div id="container">

		<div id="perfil">
				<?php
				echo '<img src= "/ProyectoStartOn/img/'.$transfer->getImagenEvento().'"  style="width:100%">';
				echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getFecha().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getCantidad().'</p>';
				echo '<p class ="burbuja"> '.$transfer->getPrecio().'</p>';
				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
					echo '<a  id= "botonSubmit" class ="botonGuay" href="unirEvento.php?id='.$transfer->getNombre().'" >¡Apuntate!</a>';
				}
				if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
					if($_SESSION['id_empresa'] == $SA->getEventEmpresa($transfer->getNombre())){
						echo '<div class="row"><a class ="botonGuay">Modifica Evento</a></div>';
					}
				}
		echo '</div>';

		echo '<div>';

			$SA_Comentario = SA_Comentario::getInstance();
			$commentList = $SA_Comentario->getElementsByNombreEvento($transfer->getNombre());
			echo '<ul style="margin-top:80px">';

			if($commentList == null){
				echo '<p class="burbuja"> No existen comentarios para este evento </p>';
			}
			else{
			$SAuser = SA_Usuario::getInstance();

      foreach($commentList as $document){  /* Follows will be created and deleted from the companies list*/
						$transferUs = $SAuser->getElement($document->getId_Usuario());
						$nombreUs = $transferUs->getNombre();

						echo '<li> '.$nombreUs.'</li>';
            echo ' <li> '. $document->getTitulo() .'</li>';
            echo ' <li> '. $document->getContenido() .'<li>';

						if((isset($_SESSION['id_usuario'])) && ($document->getId_Usuario() == $_SESSION['id_usuario'])){
							echo '<form action="'.<?php echo "htmlspecialchars($_SERVER["PHP_SELF"])"; ?>.'" method="post">';
	            	echo '<button class="botonGuay" id="botonRojo" type="submit" name="delete" value="'.$document->getNombreEvento().'">Delete</button>';
							echo '</form>';
						}
      }
		}
			echo'</ul>';

			?>
		</div>

	</div>
	<?php require("common/footer.php")?>
</body>
</html>
