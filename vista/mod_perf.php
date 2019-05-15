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
				$archivo_destino = "";
				if($_FILES["archivo"]["name"] != "" && $_FILES["archivo"]["type"] == "application/pdf"){
					$archivo_ruta = $_FILES["archivo"]["tmp_name"];
					$archivo_destino = "../pdf/curr". $_SESSION["id_usuario"].".pdf";
					copy($archivo_ruta,$archivo_destino);
				}

				$SA = SA_Usuario::getInstance();
				$transfer = new TransferUsuario($_SESSION["id_usuario"],$nombre,$apellido,$password, $email,$localizacion, $experiencia ,$pasiones ,$presentacion,$imagen,$oficio,$archivo_destino);
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
  <div class="rowC"> <!--Row modificar campos-->
    <div class="titulo">Modificar campos:</div>
  </div>
	<div id="Modperfil">

		<form enctype="multipart/form-data" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Nombre: <input type="text" id="ModperfilCampos" name="nombre" value=<?php echo $transfer->getNombre(); ?>></p>
				<?php if(isset($_SESSION["id_usuario"])){
				echo '<p>Apellidos: <input type="text" name="apellido"id="ModperfilCampos" value="'.$transfer->getApellido().'"></p>';
				}?>
				<p>E-mail: <input type="email" id="ModperfilCampos"name="email" value=<?php echo $transfer->getEmail(); ?>></p>
				<p>Contraseña: <input type="password" id="ModperfilCampos"name="password" value=""></p>
			 	<p>Localidad: <input type="text" id="ModperfilCampos"name="localizacion" value=<?php echo $transfer->getLocalizacion(); ?>></p>
			  	<?php 	if(isset($_SESSION["id_usuario"])){
				  			echo '<p>Experiencia: <textarea rows="4" cols="20" name="experiencia" id="ModperfilCampos" value=""> '. $transfer->getExperiencia().' </textarea><p>
				  			<p>Pasiones: <textarea rows="4" cols="20" name="pasiones" id="ModperfilCampos"value=""> '. $transfer->getPasiones().' </textarea></p>
				  			<p>Currículum: <input type="file" name="archivo" id="ModperfilCampos"value="">
				  			';
				  		}
			  			else{
			  				echo '<p>Fase: <input type="text" name="fase"id="ModperfilCampos" value="'. $transfer->getFase().'"></p>
			  				<p>Buscamos: <textarea rows="4" cols="20" name="buscamos"id="ModperfilCampos" value="">'. $transfer->getBuscamos().'</textarea><p>
				  			<p>Ofrecemos: <textarea rows="4" cols="20" name="ofrecemos"id="ModperfilCampos" value="">'. $transfer->getOfrecemos().'</textarea></p>
				  			<p>Sector: <input type="text"  id="ModperfilCampos" name="sector" value="'. $transfer->getSector().'"></p>';
			  			}
			  	 ?>
			  	<p>Presentación: <textarea rows="4" cols="20" name="presentacion" id="ModperfilCampos" value=<?php echo $transfer->getCartaPresentacion(); ?>></textarea></p>
			  	<p>Oficio: <input type="text" name="oficio" id="ModperfilCampos"value=<?php echo $transfer->getOficio(); ?>></p>
			  	<p>Imagen de perfil: <input type="text"id="ModperfilCampos" name="imagen" value=<?php echo $transfer->getImagenPerfil(); ?>></p>
				<p><input id="botonSubmit" class="botonGuay" type="submit" name="submit" value="Guardar"></p>
		  		</form>
          <div>
		  		      <input id="botonSubmit" class="botonGuay" type="button" value="Borrar" onclick="borrarPerfil()"></input>
          </div>
		  		<script type="text/javascript">
		  			function borrarPerfil(){
		  				if(confirm("¿Estás seguro de que quieres borrar tu perfil? (Los datos guardados se perderán para siempre)")){
		  					window.location.assign("delete.php");
		  				}
		  			}
		  		</script>
	</div>
		 <?php require("common/footer.php")?>
</body>
</html>
