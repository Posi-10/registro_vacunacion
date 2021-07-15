<?php require_once 'app/config.php';?>
<!doctype html>
<html lang="es">
  <head>
    <title>Registro de Vacunación</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'app/dependencias.php';?>
  </head>
  <body>
    <main>
      <?php
        if(isset($_GET['view'])){
          switch($_GET['view']){
            case 'login':{
              require_once 'view/login.php';
              break;
            }
            case 'registro':{
              require_once 'view/registro.php';
              break;
            }
            case 'inicio':{
              require_once 'view/inicio.php';
              break;
            }
            default:{
              require_once 'view/error_404.php';
              break;
            }
          }
        }else{
          header('location:login');
        }
      ?>
    </main>
  </body>
</html>