<!DOCTYPE html>

<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="container">
			<?php require("common/header.php")?>
			<div class="row">
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$nombre = test_input($_POST["nombre"]);
					$apellido = test_input($_POST["apellido"]);
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));
					$password2 = sha1(md5(test_input($_POST["password2"])));
					if($password !== $password2){
						$dir = "Error";
					}
					else{
						$SA = SA_Usuario::getInstance();
						$transfer = new TransferUsuario("",$nombre,$apellido,$password, $email,"", "" ,"" ,"","","");
				 		$dir = $SA->createElement($transfer);
				 	}
				 	if($dir !== "Error"){
						header('Location: '.$dir);
				 	}
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				?>
				</form>
				<h2>Regístrate como usuario aquí:</h2>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p>Nombre: <input type="text" name="nombre" value=""></p>
					<p>Apellido: <input type="text" name="apellido" value=""></p>
				  <p>E-mail: <input type="email" name="email" value=""></p>
				  <p>Contraseña: <input type="password" name="password" value=""></p>
				  <p>Repetir contraseña: <input type="password" name= "password2" value=""></p>
				  <input type="submit" name="submit" value="Submit">
		  		</form>
			</div>
				<?php require("common/footer.php")?>
		</div>
</body>
</html>
