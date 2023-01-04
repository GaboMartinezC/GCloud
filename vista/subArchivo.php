<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="icon" type="icon/png" href="img/logo.png">
		<title>	Sube el archivo</title>
	</head>
	<body>
		<nav class="navbar is-black" role="navigation" aria-label="main navigation">
	    <div class="navbar-item">
	    	<a href="sesion.php" class="button">
	        	<span class="icon">
	           		<i class="fa  fa-chevron-left"></i>
	         	</span>
	         	<span><h1 class="subtitle">Volver</h1></span>
	      	</a>
	    </div>
    	<div class="navbar-brand">
    		<figure class="image is-128x128">
        		<img class="is-rounded" src="img/logo.png" width="100" heigth = "100">
      		</figure>
    	</div>
    	</nav><br>
		<h1 class="title">&nbsp&nbsp&nbsp&nbspSubir Archivos</h1>
		<div class="container">
			<form action="subArchivo.php" method="post" enctype="multipart/form-data">
				<div id="file-js-example" class="file has-name is-centered is-boxed is-large">
				  <label class="file-label">
				    <input class="file-input" type="file" name="resume">
				    <input type="hidden" name="formulario">
				    <span class="file-cta">
				      <span class="file-icon">
				        <i class="fa fa-upload"></i>
				      </span>
				      <span class="file-label">
				        Selecciona el archivo...
				      </span>
				    </span>
				    <span class="file-name">
				      No hay archivo
				    </span>
				  </label>
				</div>
				<script src = "js/nombreArchivo.js" ></script><br>
				<div class="level-item is-centered">
					<input class="button is-medium is-success is-outlined" type="submit" name="">
					<span>&nbsp&nbsp&nbsp&nbsp</span>
					<a href="sesion.php" class="button is-medium is-danger is-outlined"><p>Cancelar</p></a>		    
				</div>
			</form><br>	
		</div>
	</body> 
</html>
<?php
	$valRet;
	if (isset($_POST['formulario']))
	{
		$notification = "notification is-danger is-light";
		$delete = "delete";
		$columns = "columns";
		$column = "column";
		session_start();
		include_once '../controlador/contArchivo.php';
		$obj = new ContArchivo();
		$valRet = $obj->SubirArchivo($_SESSION['email'], $_SESSION['id']);
		switch ($valRet)
		{
			case 1: 
				include_once 'notificaciones/notRetVal1.html';
				break;
			case 2:
				include_once 'notificaciones/notRetVal2.html';
				break;
			case 3:
				include_once 'notificaciones/notRetVal3.html';
				break;
		}
	}
?>
<script src = "js/closeNot.js" ></script>