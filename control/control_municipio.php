<?php
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $estado = $_POST["estado"];
    echo $usuario->municipio($estado);
?>