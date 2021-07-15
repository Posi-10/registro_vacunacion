<?php
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $datos = array(
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
      "codigopostal" => $_POST["codigopostal"],
      "correo" => $_POST["correo"],
      "pass" => $_POST["pass"]
    );
    echo $usuario->registro($datos);
?>