<?php
	require_once("../config.php");
	include_once "../SA/SA_Usuario.php";
	include_once "../SA/SA_Empresa.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>

<body>
	<div id="container">
			<?php require("includes/common/header.php")?>
			<div class="row">
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));

					if($_REQUEST["mode"] == "usuario"){
						$SA = SA_Usuario::getInstance();
						$transfer = new TransferUsuario("","","",$password, $email,"", "" ,"" ,"","", "");
					 	$dir = $SA->login($transfer);
					 	if($dir !== "error"){
							header('Location: '.$dir);
					 	}
					} else{
						$SA = SA_Empresa::getInstance();
						$transfer = new empresaTransfer("","",$password, $email,"", "" ,"" ,"","","","","");
						$dir = $SA->login($transfer);
					 	if($dir !== "error"){
							header('Location: '.$dir);
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

				<h2>Inicia sesión:</h2>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				  <p>E-mail: <input type="email" name="email" value=""></p>
				  <p>Contraseña: <input type="password" name="password" value=""></p>
				 <p> Iniciar sesión como: <br>
				  <input type="radio" name="mode" value ="usuario" checked> Usuario
				  <input type="radio" name="mode" value ="empresa"> Empresa </p>
				  <input type="submit" name="submit" value="Submit">
		  		</form>
			</div>
			<?php require("includes/common/footer.php")?>
		</div>
</body>
</html>
