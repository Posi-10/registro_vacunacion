<?php
    require_once 'clases/Usuario.php';
    $usuario = new Usuario();
    $login = array(
      "email" => $_POST["email"],
      "pass" => $_POST["pass"]
    );
    echo $usuario->login($login['email'], $login['pass']);
?>