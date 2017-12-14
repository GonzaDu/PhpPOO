<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/Config/conexion.php';
 //require_once 'Config/conexion.php';

 class Cliente {
     
    private $id;
    private $ci;
   private $nombre;
   private $apellido;
   private $direccion;

   const TABLA = 'cliente';
  
    /*public function getId(){
        return $this->id;
    }*/

   public function getId() {
      return $this->id;
   }
   public function getCi() {
      return $this->ci;
   }
   public function getNombre() {
      return $this->nombre;
   }
   public function getApellido() {
    return $this->apellido;
    }
    public function getDireccion() {
        return $this->direccion;
     }
     public function setId($id) {
        $this->id = $id;
     }
   public function setCi($ci) {
      $this->ci = $ci;
   }
   public function setNombre($nombre) {
      $this->nombre = $nombre;
   }
   public function setApellido($apellido) {
    $this->apellido = $apellido;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
     }
   public function __construct($id,$ci,$nombre,$apellido,$direccion) {
      $this->ci = $ci;
      $this->nombre = $nombre;
      $this->id = $id;
      $this->apellido = $apellido;
      $this->direccion = $direccion;
   }
   /*
   public function guardar(){
      $conexion = new Conexion();
      if($this->id) /*Modifica*//* {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':descripcion', $this->descripcion);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
 }else /*Inserta*//* {
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, descripcion) VALUES(:nombre, :descripcion)');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':descripcion', $this->descripcion);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
   }
   */
   /*
   public static function autenticarUsuario($usuario,$contrasena)
   {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario = :usuario and contrasena = :contrasena');
    $consulta->bindParam(':usuario',$usuario,PDO::PARAM_STR);
    $consulta->bindParam(':contrasena', $contrasena,PDO::PARAM_STR);
    $consulta->execute();
    $registros = $consulta->fetchAll();
    return $registros;
   }*/

   public static function buscarPorId($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
        if($registro){
            return new self($registro['id'], $registro['nombre'],$registro['apellido'],$registro['direccion']);
        }else{
            return false;
        }
    }

    public static function buscarPorNombre($nombre){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE nombre like :nombre');
        $nombre = "%".$nombre."%";
        $consulta->bindParam(':nombre',$nombre);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
        }

    public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  * FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
     }

 }
?>