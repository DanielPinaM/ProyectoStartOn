<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
require_once ("../logica/SA_Like.php");
require_once ("../logica/SA_Usuario.php");
require_once ("../logica/transferLike.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require("common/header.php")?>


	<<?php
		if(isset($_POST['like'])){
			$idusuario = htmlspecialchars($_SESSION['id_usuario']);
			$idempresa = $_POST['like'];

			$SAlikes = SA_Like::getInstance();
			$SAlikes->insertLike($idempresa, $idusuario);
		}

		if(isset($_POST['dislike'])){
			$idusuario = htmlspecialchars($_SESSION['id_usuario']);
			$idempresa = $_POST['dislike'];

			$SAlikes = SA_Like::getInstance();
			$SAlikes->deleteLike($idempresa, $idusuario);
		}
	 ?>


	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
				$id = $_SESSION['id_empresa'];
				$SA = SA_Empresa::getInstance();
				$SAlikes = SA_Like::getInstance();
				$SAUsuario = SA_Usuario::getInstance();

				$transfer = $SA->getElement($id);
				$likesList = $SAlikes->getElementsByIdEmpresa($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$SAlikes = SA_Like::getInstance();
			$SAUsuario = SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$SAlikes = SA_Like::getInstance();
			$SAUsuario = SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
		}else{
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$SAlikes = SA_Like::getInstance();
			$SAUsuario = SA_Usuario::getInstance();

			$transfer = $SA->getElement($id);
			$likesList = $SAlikes->getElementsByIdEmpresa($id);
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>


	<div id="perfil">
		<div id="card">
			<?php
			echo '<img src= "/ProyectoStartOn/'.$transfer->getImagenPerfil().'"  style="width:100%">';
			echo '<p class ="burbuja" id="btitulo"> '.$transfer->getNombre().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getLocalizacion().'</p>';
			echo '<p class ="burbuja"> '.$transfer->getSector().'</p>';
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Carta de presentacion</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getCartaPresentacion()." </p>";
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Que ofrecemos</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getOfrecemos()." </p>";
			?>
		</div>

		<div id="card">
			<p class ='burbuja' id='btitulo'>Que buscamos</p>
			<?php
				echo "<p class='burbuja' id='btexto'> ".$transfer->getBuscamos()." </p>";
			?>
		</div>
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa']))
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa'])))
					echo '<a  id= "botonSubmit" class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>';
		?>
			</div>

		<!--PHP LISTA LIKES-->
		<?php
				if(isset($_SESSION['login'])){
					echo "<div class='card'>";
					if($likesList != null){
						echo '<ul>';
					foreach($likesList as $transfer) {
						$idlikeDado = $transfer->getId_Usuario();
						$tUsuario = $SAUsuario->getElement($idlikeDado);
						$nombreUsuario = $tUsuario->getNombre();
						$nombreUsuario = $nombreUsuario . " " . $tUsuario->getApellido();

						echo '<li>';
						echo "<p class='burbuja'> ".$nombreUsuario." </p>";
						echo '</li>';
					}
					echo '</ul>';
				}else{
					echo "<p class='burbuja'> Esta empresa no tiene likes aún </p>";
				}
					echo "</div>";
				}
		 ?>

	<!-- BOTON LIKES-->
	<?php

			if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_usuario'])){
				$idEmp = $transfer->getId_Empresa();



				if($SAlikes->getElementsByIds($idEmp, $_SESSION['id_usuario']) != false){
					echo '<form action="perfEmp.php?id='.$idEmp.'" method="post">';
						echo '<button class="botonGuay" id="botonRojo" type="submit" name="dislike" value="'.$idEmp.'">Quitar like</button>';
					echo '</form>';
				}
				else{
					echo '<form action="perfEmp.php?id='.$idEmp.'" method="post">';
						echo '<button class="botonGuay" id="likeButton" type="submit" name="like" value="'.$idEmp.'">Like</button>';
					echo '</form>';
				}
			}
	 ?>

		<?php require("common/footer.php")?>
</body>
</html>
