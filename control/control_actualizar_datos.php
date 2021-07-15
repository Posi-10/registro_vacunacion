<?php
    session_start();
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $datos = array(
      "id_usuario" => $_SESSION["id_usuario"],
      "nombre" => $_POST["nombre"],
      "apaterno" => $_POST["apaterno"],
      "amaterno" => $_POST["amaterno"],
      "fecha" => $_POST["fecha"],
      "sexo" => $_POST["sexo"],
      "curp" => $_POST["curp"],
      "estado" => $_POST["estado"],
      "municipio" => $_POST["municipio"],
      "colonia" => $_POST["colonia"],
      "direccion" => $_POST["direccion"],
      "codigopostal" => $_POST["codigopostal"]
    );
    echo $usuario->actualizar($datos);
?>