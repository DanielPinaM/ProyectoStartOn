<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Empresa.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require("common/header.php")?>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
				$id = $_SESSION['id_empresa'];
				$SA = SA_Empresa::getInstance();
				$transfer = $SA->getElement($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$transfer = $SA->getElement($id);
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Empresa::getInstance();
			$transfer = $SA->getElement($id);

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
			<img src="<?php echo $transfer->getImagenPerfil(); ?>" alt="John" style="width:100%">
			<?php
			echo '<p id ="burbuja"> '.$transfer->getNombre().'</p>';
			echo '<p id ="burbuja"> '.$transfer->getLocalizacion().'</p>';
			echo '<p id ="burbuja"> '.$transfer->getSector().'</p>';
			?>
		</div>

		<div id="card">
			<h2>Carta de presentacion</h2>
			<?php
				echo "<p> ".$transfer->getCartaPresentacion()." </p>";
			?>
		</div>

		<div id="card">
			<h2>Que ofrecemos</h2>
			<?php
				echo "<p> ".$transfer->getOfrecemos()." </p>";
			?>
		</div>

		<div id="card">
			<h2>Que buscamos</h2>
			<?php
				echo "<p> ".$transfer->getBuscamos()." </p>";
			?>
		</div>
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true)
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa'])))
				echo '<a href="mod_perf.php" >Modificar perfil</button>';
		?>
	</div>

		<?php require("common/footer.php")?>
</body>
</html>
