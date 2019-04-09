
<?php 
require_once ("../config.php");
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
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$nombre = test_input($_POST["nombre"]);
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));

					$SA = SA_Empresa::getInstance();
					$transfer = new empresaTransfer("",$nombre,$password, $email,"", "" ,"" ,"","","","","");
				 	$dir = $SA->createElement($transfer);
				 	if($dir !== "error"){
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
				<h2>Regístrate como empresa aquí:</h2>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
					<p>Nombre: <input type="text" name="nombre" value=""></p>
				  <p>E-mail: <input type="email" name="email" value=""></p>
				  <p>Contraseña: <input type="password" name="password" value=""></p>
				  <input type="submit" name="submit" value="Submit">
		  		</form>
			</div>
			<?php require("includes/common/footer.php")?>
		</div>
</body>
</html>
