<?php

/*class Conexion extends PDO { 
	private $tipo_de_base = 'mysql';
	private $host = 'localhost';
	private $nombre_de_base = 'id2582879_usuario';
	private $usuario = 'id2582879_gonza';
	private $contrasena = 'tricolores23'; 
	public function __construct() {
	   //Sobreescribo el método constructor de la clase PDO.
	   try{
		  parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
	   }catch(PDOException $e){
		  echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
		  exit;
	   }
	} 
	}*/ 
	
	class Conexion extends PDO { 
		private $tipo_de_base = 'mysql';
		private $host = 'localhost';
		private $nombre_de_base = 'pruebas';
		private $usuario = 'root';
		private $contrasena = ''; 
		public function __construct() {
			 //Sobreescribo el método constructor de la clase PDO.
			 try{
				parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
			 }catch(PDOException $e){
				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit;
			 }
		} 
		} 


    ?>