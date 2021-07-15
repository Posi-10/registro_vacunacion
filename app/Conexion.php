<?php
  class Conexion{
    public function conectar(){
      $conexion = new mysqli('localhost', 'root', '', 'regristro_vacunacion');
      if($conexion->connect_errno){
        echo 'Error en la conexion' . $conexion->connect_error;
      }
      $conexion->set_charset("utf8mb4");
      return $conexion;
    }
  }
?>