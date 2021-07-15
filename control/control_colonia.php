<?php
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $municipio = $_POST["municipio"];
    echo $usuario->colonia($municipio);
?>