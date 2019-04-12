<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
require_once ("../logica/SA_Usuario.php");
 ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Start On</title>
</head>
<body>
	<?php require("common/header.php")?>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nombre = test_input($_POST["nombre"]);
			$password = sha1(md5(test_input($_POST["password"])));
			$email = test_input($_POST["email"]);
			$localizacion = test_input($_POST["localizacion"]);
			$imagen = test_input($_POST["imagen"]);
			$presentacion = test_input($_POST["presentacion"]);
			$oficio = test_input($_POST["oficio"]);

			if(isset($_SESSION["id_usuario"])){
				$apellido = test_input($_POST["apellido"]);
				$experiencia = test_input($_POST["experiencia"]);
				$pasiones = test_input($_POST["pasiones"]);

				$SA = SA_Usuario::getInstance();
				$transfer = new TransferUsuario($_SESSION["id_usuario"],$nombre,$apellido,$password, $email,$localizacion, $experiencia ,$pasiones ,$presentacion,$imagen,$oficio);
			 	$dir = $SA->updateElement($transfer);
			 	if($dir !== "Error"){
					header('Location: '.$dir);
			 	}
			}
			else{
				$fase = test_input($_POST["fase"]);
				$buscamos = test_input($_POST["buscamos"]);
				$ofrecemos = test_input($_POST["ofrecemos"]);
				$sector = test_input($_POST["sector"]);

				$SA = SA_Empresa::getInstance();
				$transfer = new empresaTransfer($_SESSION["id_empresa"],$nombre,$password, $email,$localizacion,$sector,$oficio, $fase ,$imagen,$presentacion,$buscamos,$ofrecemos);
				$dir = $SA->updateElement($transfer);
		 		if($dir !== "Error"){
					header('Location: '.$dir);
				}
			}
		}
		else{
			if(isset($_SESSION['login']) && $_SESSION['login'] == true){
				if(isset($_SESSION["id_usuario"])){
					$id = $_SESSION['id_usuario'];
					$SA = SA_Usuario::getInstance();
					$transfer = $SA->getElement($id);
				}else{
					$id = $_SESSION['id_empresa'];
					$SA = SA_Empresa::getInstance();
					$transfer = $SA->getElement($id);
				}

			}
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<div id="perfil">
		<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Nombre: <input type="text" name="nombre" value=<?php echo $transfer->getNombre(); ?>></p>
				<?php if(isset($_SESSION["id_usuario"])){
				echo '<p>Apellidos: <input type="text" name="apellido" value="'.$transfer->getApellido().'"></p>';
				}?>
				<p>E-mail: <input type="email" name="email" value=<?php echo $transfer->getEmail(); ?>></p>
				<p>Contraseña: <input type="text" name="password" value=""></p>
			 	<p>Localidad: <input type="text" name="localizacion" value=<?php echo $transfer->getLocalizacion(); ?>></p>
			  	<?php 	if(isset($_SESSION["id_usuario"])){
				  			echo '<p>Experiencia: <textarea rows="4" cols="20" name="experiencia" value=""></textarea><p>
				  			<p>Pasiones: <textarea rows="4" cols="20" name="pasiones" value=""></textarea></p>';
				  		}
			  			else{
			  				echo '<p>Fase: <input type="text" name="fase" value=""></p>
			  				<p>Buscamos: <textarea rows="4" cols="20" name="buscamos" value=""></textarea><p>
				  			<p>Ofrecemos: <textarea rows="4" cols="20" name="ofrecemos" value=""></textarea></p>
				  			<p>Sector: <input type="text" name="sector" value=""></p>';
			  			}
			  	 ?>
			  	<p>Presentación: <textarea rows="4" cols="20" name="presentacion" value=<?php echo $transfer->getCartaPresentacion(); ?>></textarea></p>
			  	<p>Oficio: <input type="text" name="oficio" value=<?php echo $transfer->getOficio(); ?>></p>
			  	<p>Imagen de perfil: <input type="text" name="imagen" value=<?php echo $transfer->getImagenPerfil(); ?>></p>
				<input type="submit" name="submit" value="Guardar Cambios">
		  		</form>
	</div>
		<?php require("common/footer.php")?>
</body>
</html>
