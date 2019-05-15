
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/common.css">
  <title>Start On</title>
  <meta charset="utf-8">
</head>
<script>
function showListaOrdenada(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("container").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ordenacionListaEventos.php?q="+str, true);
  xhttp.send();
}
</script>
<body>
  <?php require("common/header.php")?>
      <div id="espacio"></div>
      <p> <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Fecha')" >Fecha</a>
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Localizacion')" >Localizacion</a>
        <a  id= "botonSubmit" class ="botonGuay" onclick="showListaOrdenada('Precio')" >Precio</a>
      </p>
	<div id="container"></div>
  <?php require("common/footer.php")?>
</body>

<!-- test -->
