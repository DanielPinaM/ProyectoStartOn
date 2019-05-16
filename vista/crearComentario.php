<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Comentario.php");
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
      $SA_Usuario = SA_Usuario::getInstance();
      $SA = SA_Comentario::getInstance();

			$Titulo = test_input($_POST["titulo"]);
			$Contenido = test_input($_POST["contenido"]);
      $user = $SA_Usuario->getElement($_SESSION["id_usuario"]);
      $idUsuario = $user->getId_Usuario();
  
				$transfer = new transferComentario($nombreEvento, $idUsuario, $Titulo, $Contenido);
			 	$SA->createElement($transfer);

        $formAction = 'listaEventos.php';
				header('Location: '.$formAction);
			}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
  <div class="rowC">
    <div class="titulo">Crear comentario:</div>
  </div>
	<div id="Modperfil">

    <!--<?php  $value = $_POST["crearComentario"]; ?> -->
		<form enctype="multipart/form-data" method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Título: <input type="text" id="ModperfilCampos" name="titulo" value=""></p>
				<p>Contenido: <input type="text" id="ModperfilCampos" name="contenido" value=""></p>
        <!-- ' <p>Contenido: <input type="text" id="ModperfilCampos" name="contenido" value="'.$value.'"></p>'; -->

				<p><input id="botonSubmit" class="botonGuay" type="submit" name="submit" value="Crear"></p>
		</form>

	</div>
		 <?php require("common/footer.php")?>
</body>
</html>
