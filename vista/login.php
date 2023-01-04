<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.4/css/bulma.min.css" integrity="sha512-HqxHUkJM0SYcbvxUw5P60SzdOTy/QVwA1JJrvaXJv4q7lmbDZCmZaqz01UPOaQveoxfYRv1tHozWGPMcuTBuvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="icon/png" href="img/logo.png">
    <title>G-Cloud || Ingresar</title>
  </head>
  <nav class="navbar is-black" role="navigation" aria-label="main navigation">
    <div class="navbar-item">
          <a href="../index.php" class="button">
            <span class="icon">
              <i class="fa  fa-chevron-left"></i>
            </span>          </a>
        </div>
      <div class="navbar-brand">
        <figure class="image is-128x128">
          <img class="is-rounded" src="img/logo.png" width="100" heigth = "100">
        </figure>
      </div>
    </nav><hr>
    <div class="columns">
      <div class="column"></div>
      <div class="column">
        <form action="login.php" method="post" class="box">
          <input type="hidden" name="formulario">
          <div class="field">
            <label class="label">Correo</label>
            <div class="control">
              <input class="input" type="email" name="email">
            </div>
          </div>
          <div class="field">
            <label class="label">Contraseña</label>
            <div class="control">
              <input class="input" type="password" name="password">
            </div>
          </div>
          <button class="button is-black">&nbsp&nbsp&nbsp&nbsp&nbspIngresar&nbsp&nbsp&nbsp&nbsp&nbsp</button>
          <a href="signup.php" class="button is-dark is-outlined">
            <span class="icon">
              <i class="fa fa-plus"></i>
            </span>
            <span><p>Registrarse</p></span>
          </a>
        </form>
      </div>
      <div class="column"></div>
    </div><hr>
</html>
<?php
  include_once '../controlador/contUsuario.php';
  include_once '../modelo/usuarioEnt.php';
  if (isset($_POST['formulario']))
  {
    $user = new Usuario($_POST['email'],$_POST['password']);
    $controlador = new ContUsuario($user);
    $valRet = $controlador->IniciarSesion();
    if (!$valRet)
    {
      include_once 'notificaciones/noAcc.html';
    }
    else
    {
      echo '<script type="text/javascript">'
        , 'window.location.href = "sesion.php";'
        , '</script>';
    }
  }
?>
<script src = "js/closeNot.js" ></script>