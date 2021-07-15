<?php
    require_once 'clases/Doctor.php';
    $doctor = new Doctor();
    $datos = array(
      "nombre" => $_POST["nombre"],
      "apaterno" => $_POST["apaterno"],
      "amaterno" => $_POST["amaterno"],
      "sexo" => $_POST["sexo"],
      "hospital" => $_POST["hospital"],
      "cedula" => $_POST["cedula"],
      "estado" => $_POST["estado"],
      "municipio" => $_POST["municipio"],
      "colonia" => $_POST["colonia"],
      "direccion" => $_POST["direccion"],
      "codigopostal" => $_POST["codigopostal"],
      "correo" => $_POST["correo"],
      "pass" => $_POST["pass"]
    );
    echo $doctor->registro($datos);