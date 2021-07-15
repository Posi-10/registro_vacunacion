<?php
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $codigoPostal = $_POST["codigoPostal"];
    echo $usuario->codigoPostal($codigoPostal);
?>