<!DOCTYPE html>
<?php 
	require_once("../config.php");
	session_unset(); 
	session_destroy();
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
</head>
<body>
	<div class="container">
		<?php require("includes/common/header.php")?>
		<div class="row">
			<div class="titulo">
				Start On
			</div>
		</div>
		<div class="row">
			Saliste de la sesion. Te echaremos de menos
		</div>
		<?php require("includes/common/footer.php");?>
</body>
</html>