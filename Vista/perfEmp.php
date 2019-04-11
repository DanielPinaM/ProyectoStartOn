

<!DOCTYPE html>

<?php 
	require_once __DIR__'../includes/config.php';
	require_once __DIR__'../patrones/SA_Empresa.php';
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="perfiles.css" />
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require __DIR__'common/header.php'?>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true){
			$id = $_SESSION['id_empresa'];
			$SA = SA_Empresa::getInstance();
			$transfer = $SA->getElement($id);
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
			<hr />
			<?php
				echo "<p> ".$transfer->getCartaPresentacion()." </p>";
			?>
		</div>

		<div id="card">
			<h2>Que ofrecemos</h2>
			<hr />
			<?php
				echo "<p> ".$transfer->getOfrecemos()." </p>";
			?>
		</div>

		<div id="card">
			<h2>Que buscamos</h2>
			<hr />
			<?php
				echo "<p> ".$transfer->getBuscamos()." </p>";
			?>
		</div>
		<a href="mod_perf.php" >Modificar perfil</button>
	</div>
	<!--<button type ='button'  onclick="window.location = 'http://www.marca.com';"/> WebEmpresa.es </button>
	<!-- poner el CV en vez de marca arriba, osea, window.open('curriculum.php', 'width=800,height=600') -->

		<?php require __DIR__'common/footer.php'?>
</body>
</html>
