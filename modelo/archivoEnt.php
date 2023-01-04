<?php 
	class Archivo
	{
		private $id;
		private $idUsuario;
		private $descripcion;
		private $peso;
		private $fecha;
		private $extension; 

		public function GetId() {
			return $this->id;
		}
		public function SetId($id) {
			$this->id = $id;
		}
		public function GetIdUsuario() {
			return $this->idUsuario;
		}
		public function SetIdUsuario($idUsuario) {
			$this->idUsuario = $idUsuario;
		}
		public function GetDescripcion() {
			return $this->descripcion;
		}
		public function SetDescripcion($descripcion) {
			$this->descripcion = $descripcion;
		}
		public function GetPeso() {
			return $this->peso;
		}
		public function SetPeso($peso) {
			$this->peso = $peso;
		}
		public function GetFecha()
		{
			return $this->fecha;
		}
		public function SetFecha($fecha) {
			$this->fecha = $fecha;
		}
		public function GetExtension() {
			return $this->fecha;
		}
		public function SetExtension ($extension) {
			$this->extension = $extension;
		}
	}
?>