<?php
	class ContArchivo
	{	
		public function Consulta ($id, $descripcion)
		{
			include_once '../modelo/db/database.php';
			$consulta = "SELECT * FROM ARCHIVOS WHERE ID_USUARIO = '$id' AND EXTENSION = '$descripcion'";
			$objRetVal = mysqli_query($conn, $consulta);
			return $objRetVal;
		}
		public function VerTodo($id)
		{
			include_once '../modelo/db/database.php';
			$consulta = "SELECT * FROM ARCHIVOS WHERE ID_USUARIO = '$id'";
			$objRetVal = mysqli_query($conn, $consulta);
			return $objRetVal;
		}	
		public function BorrarArchivo($archivo)
		{
			session_start();
			include_once '../modelo/db/database.php';
			//Obtiene el id del archivo para las consultas
			$id = $archivo->GetId();
			//Busca los datos del archivo
			$sqlDescrip = "SELECT * FROM ARCHIVOS WHERE ID = '$id'";
			$resul = mysqli_query($conn,$sqlDescrip);
			$row = mysqli_fetch_assoc($resul);
			//Introduce en el objeto archivo los datos
			$archivo->SetIdUsuario($row["ID_USUARIO"]);
			$archivo->SetDescripcion($row["DESCRIPCION"]);
			//Introduce el usuario en una variable
			$usuario = $_SESSION['email'];
			//Borra el archivo con los datos recolectados del registro en base de datos y el fichero
			$sql = "DELETE FROM ARCHIVOS WHERE ID = '$id'";
			mysqli_query($conn,$sql);
			$ruta = "../modelo/arch/".$usuario."/".$archivo->GetDescripcion();
			unlink($ruta);
		}
		public function SubirArchivo($email, $id)
		{
			include_once '../modelo/db/database.php';
			$retVal; 
			$direccion = "../modelo/arch/".$email."/".$_FILES['resume']['name'];
			$descripcion = $_FILES['resume']['name'];
			$extension = strtolower(pathinfo($direccion,PATHINFO_EXTENSION));
			$sql = $conn->query("select * from archivos where descripcion = '$descripcion'");
			if ($sql->fetch_Object())
			{
				$retVal = 3;
			}
			else
			{
				if (move_uploaded_file($_FILES['resume'] ['tmp_name'], $direccion))
				{
					$retVal = 1;
					$sz = filesize($direccion) / 1000;
					$sql = "INSERT INTO ARCHIVOS (ID_USUARIO,DESCRIPCION,PESO,FECHA,EXTENSION) VALUES ('$id', '$descripcion','$sz',CURRENT_DATE,'$extension')";
					mysqli_query($conn,$sql);
				}
				else
				{
					$retVal = 2;
				}
			}
			return $retVal;
		}
	}
?>