<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Config/conexion.php';
  //require_once 'Config/conexion.php';

 class DetalleCliente {
     
    private $idCliente;
    private $factura;
   private $monto;
   private $fecha;

   const TABLA = 'detalleCliente';
  
    /*public function getId(){
        return $this->id;
    }*/

   public function getIdCliente() {
      return $this->idCliente;
   }
   public function getFactura() {
      return $this->factura;
   }
   public function getMonto() {
      return $this->monto;
   }
   public function getFecha() {
    return $this->fecha;
    }
     public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
     }
   public function setFactura($factura) {
      $this->factura = $factura;
   }
   public function setMonto($monto) {
      $this->monto = $monto;
   }
   public function setFecha($fecha) {
    $this->fecha = $fecha;
    }

   public function __construct($idCliente,$factura,$monto,$fecha) {
      $this->idCliente = $idCliente;
      $this->factura = $factura;
      $this->monto = $monto;
      $this->fecha = $fecha;
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
   /*
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
    */

    public static function buscarPorIdCliente($idCliente){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idCliente = :idCliente');
        $consulta->bindParam(':idCliente', $idCliente,PDO::PARAM_INT);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
        /*
    public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  * FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
     }
*/
 }
?>