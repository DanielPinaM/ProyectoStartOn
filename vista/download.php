<?php
if(isset($_GET["id"])){
	header("Content-disposition: attachment; filename=curriculum.pdf");
	header("Content-type: application/pdf");
	readfile("../pdf/curr".$_GET['id'].".pdf");
}
else{
	header("Location: index.php");
}
?>