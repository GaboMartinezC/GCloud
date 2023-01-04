<?php 
	include_once 'contArchivo.php';
	include_once '../modelo/archivoEnt.php';
	$archiv = new Archivo();
	$contArchiv = new ContArchivo();
	$archiv->SetId($_GET['id']);
	$contArchiv->BorrarArchivo($archiv);
?>
<script>window.location.href = "../vista/sesion.php"</script>