<?php
  class ContUsuario
  {
    private $usuario;
    function __construct($usuario)

    {
      include_once '../modelo/usuarioEnt.php'; 
      $this->usuario = $usuario;
    }

    public function CrearUsuario($passwordVer)
    {
      include_once '../modelo/db/database.php';
      include_once '../modelo/usuarioEnt.php'; 
      $us = $this->usuario;
      $email = $us->GetEmail();
      $password = $us->GetClave();
      $retVal = 0;
      if (($email == null) or ($password == null)) 
      {
        $retVal = 1;
      }
      if ($password != $passwordVer) 
      {
        $retVal = 2;
      }
      $sql = $conn->query("select * from usuarios where email = '$email'");
      if ($sql->fetch_Object())
      {
        $retVal = 3;
      }
      if ($retVal==0)
      {
        $consulta = "INSERT INTO usuarios (EMAIL, CLAVE) VALUES ('$email','$password')";
        mysqli_query($conn, $consulta);
        mkdir('../modelo/arch/'.$email, 0777, true);
      }
      return $retVal;
    }
    public function IniciarSesion()
    {
      include_once '../modelo/db/database.php';
      include_once '../modelo/usuarioEnt.php'; 
      $retVal;
      $us = $this->usuario;
      $email = $us->GetEmail();
      $password = $us->GetClave();
      $sql = $conn->query("select * from usuarios where email = '$email' and clave = '$password'");
      if ($sql->fetch_Object()) 
      {
        session_start();
        $result = mysqli_query($conn,"select * from usuarios where email = '$email' and clave = '$password'");
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['ID'];
        $_SESSION['email'] = $email;
        $retVal = true;
      }
      else
      {
        $retVal = false; 
      }
      return $retVal;
    }
  }
?>