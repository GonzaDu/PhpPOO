<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/Config/conexion.php';
 //require_once 'Config/conexion.php';

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
      $this->usuario = $usuario;
   }
   public function setContrasena($contrasena) {
      $this->contrasena = $contrasena;
   }
   public function __construct($usuario, $contrasena,$id = null) {
      $this->usuario = $usuario;
      $this->contrasena = $contrasena;
      $this->id = $id;
   }
   public function guardar(){
      $conexion = new Conexion();
      if($this->id) /*Modifica*/ {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, contrasena = :contrasena WHERE id = :id');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':contrasena', $this->contrasena);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
      }else /*Inserta*/ {
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, contrasena) VALUES(:nombre, :contrasena)');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':contrasena', $this->contrasena);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }
      $conexion = null;
      return $consulta;
   }

   public static function insertarUsuario($usuario,$contrasena)
   {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (usuario, contrasena) VALUES(:nombre, :contrasena)');
    $consulta->bindParam(':nombre', $usuario);
    $consulta->bindParam(':contrasena', $contrasena);
    
    if($consulta->execute())
        return true;
    else
        return false;
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