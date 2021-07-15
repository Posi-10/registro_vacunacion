<?php
    session_start();
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $id_usuario = $_SESSION['id_usuario'];
    echo $usuario->obtenerDatos($id_usuario);
?>