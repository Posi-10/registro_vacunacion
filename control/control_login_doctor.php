<?php
    require_once 'clases/Doctor.php';
    $doctor = new Doctor();
    $login = array(
      "email" => $_POST["email"],
      "pass" => $_POST["pass"]
    );
    echo $doctor->login($login['email'], $login['pass']);
?>