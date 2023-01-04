<!DOCTYPE html>
<?php
  session_start();
  include_once '../controlador/contArchivo.php';
  include_once '../modelo/archivoEnt.php';
  $objContArchivo = new ContArchivo();
  if (isset($_POST['formulario']))
  {
    $resul = $objContArchivo->Consulta($_SESSION['id'], $_POST['consulta']);
  }
  else
  {
    $resul = $objContArchivo->VerTodo($_SESSION['id']); 
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="icon/png" href="img/logo.png">
    <title>G-Cloud</title>
  </head>
  <body>
  	<nav class="navbar is-black" role="navigation" aria-label="main navigation">
    <div class="navbar-item">
      <a href="../controlador/unable.php" class="button">
          <span class="icon">
            <i class="fa  fa-chevron-left"></i>
          </span>
      </a>
    </div>
    <div class="navbar-brand">
    	<figure class="image is-128x128">
        	<img class="is-rounded" src="img/logo.png" width="100" heigth = "100">
      </figure>
    </div>
    </nav> <br>
    <h1 class="title is-3">&nbsp&nbsp&nbsp&nbsp¡Hola <?php echo $_SESSION['email'];?>&nbsp!</h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="subArchivo.php" class="button is-success is-outlined is-medium">
      <span class="icon">
          <i class="fa fa-plus"></i>
      </span>
      <span><p>Nuevo Archivo</p></span>
    </a>    
    <div class="columns">
      <div class="column"></div>
      <div class="column">
        <div class="box">
          <form action="sesion.php" method="post">
            <input type="hidden" name="formulario">
            <div class="panel-block">
              <p class="control has-icons-left">
                <input class="input is-info" type="text" name = "consulta" placeholder="Buscar">
                <span class="icon is-left">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </p>
              <button class="button is-info is-outlined">
                <span class="icon is-left">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </span>
              </button>
            </div>
          </form>
        </div>
        <table class="table is-bordered is-hoverable">
          <thead><h1 class="subtitle">Tus Archivos</h1></thead>
          <th>ID</th>
          <th>&nbsp&nbsp&nbsp&nbspDESCRIPCIÓN&nbsp&nbsp&nbsp&nbsp</th>
          <th>&nbsp&nbsp&nbsp&nbspEXTENSIÓN&nbsp&nbsp&nbsp&nbsp</th>
          <th>&nbsp&nbsp&nbsp&nbspPESO&nbsp&nbsp&nbsp&nbsp</th>
          <th>&nbsp&nbsp&nbsp&nbspFECHA&nbsp&nbsp&nbsp&nbsp</th><th></th>
          <?php
            while ($row = mysqli_fetch_assoc($resul)){?>
            <tr>
              <td><?php echo $row["ID"]; ?></td>
              <td><?php echo $row["DESCRIPCION"]; ?></td>
              <td><?php echo ".".$row["EXTENSION"]; ?></td>
              <td><?php echo $row["PESO"]."Kb"; ?></td>
              <td><?php echo $row["FECHA"]; ?></td>
              <td>
                <a href="<?php echo "../modelo/arch/".$_SESSION['email']."/".$row["DESCRIPCION"] ?>" download="<?php $row["DESCRIPCION"] ?>" class="button is-info is-outlined">
                   <span class="icon">
                      <i class="fa  fa-download"></i>
                  </span>
                </a>
                <br>
                <a href="../controlador/borrar.php?id=<?php echo $row["ID"]?>" class="button is-danger is-outlined">
                   <span class="icon">
                      <i class="fa  fa-trash"></i>
                  </span>
                </a>
              </td>
            </tr><?php } ?> 
          <tr></tr>
        </table>  
      </div>
      <div class="column"></div>
    </div>
  </body>
</html>