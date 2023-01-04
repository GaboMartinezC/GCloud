<?php 
	class Usuario
	{
		private $email;
		private $clave;
		
		public function __construct ($email, $clave)
		{
			$this->email = $email;
			$this->clave = $clave;
		}
		public function GetEmail(){
			return $this->email;
		}
		public function SetEmail($email){
			$this->email = $email;
		}
		public function GetClave(){
			return $this->clave;
		}
		public function SetClave($clave){
			$this->clave = $clave;
		}
	}
?>