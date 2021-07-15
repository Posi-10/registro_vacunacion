<?php
  require_once "clases/Doctor.php";
  $doctor = new Doctor();
    $vacunado = array(
      "id_usuario" => $_POST["id_usuario"],
      "vacunado" => $_POST["vacunado"]
    );
    echo $doctor->vacunado($vacunado['id_usuario'], $vacunado['vacunado']);
?>