<?php
 //require_once $_SERVER['DOCUMENT_ROOT'].'/Config/conexion.php';
 require_once 'Config/conexion.php';

 class Usuario {
     
    private $id;
   private $usuario;
   private $contrasena;
   const TABLA = 'usuario';
  
    /*public function getId(){
        return $this->id;
    }*/

   public function getUsuario() {
      return $this->usuario;
   }
   public function getContrasena() {
      return $this->contrasena;
   }
   public function setUsuario($usuario) {
      $this->nombre = $nombre;
   }
   public function setContrasena($contrasena) {
      $this->contrasena = $contrasena;
   }
   public function __construct($id,$usuario, $contrasena) {
      $this->usuario = $usuario;
      $this->contrasena = $contrasena;
      $this->id = $id;
   }
   public function guardar(){
      $conexion = new Conexion();
      if($this->id) /*Modifica*/ {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, descripcion = :descripcion WHERE id = :id');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':descripcion', $this->descripcion);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
      }else /*Inserta*/ {
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, descripcion) VALUES(:nombre, :descripcion)');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':descripcion', $this->descripcion);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
   }

   public static function autenticarUsuario($usuario,$contrasena)
   {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario = :usuario and contrasena = :contrasena');
    $consulta->bindParam(':usuario',$usuario,PDO::PARAM_STR);
    $consulta->bindParam(':contrasena', $contrasena,PDO::PARAM_STR);
    $consulta->execute();
    $registros = $consulta->fetchAll();
    return $registros;
   }

   public static function buscarPorId($id){
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT nombre, contrasena FROM ' . self::TABLA . ' WHERE id = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    $registro = $consulta->fetch();
        if($registro){
            return new self($registro['nombre'], $registro['contrasena']);
        }else{
            return false;
        }
    }

    public static function buscarPorNombre($usuario){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario = :usuario');
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
        }

    public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  usuario, contrasena FROM ' . self::TABLA . ' ORDER BY usuario');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
     }

 }
?>