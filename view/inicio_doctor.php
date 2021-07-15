<?php
  session_start();
  require_once "app/Conexion.php";
  if(isset($_SESSION['id_doctor'])){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();
    $id = $_SESSION['id_doctor'];
    $query = "SELECT doctor_municipio FROM t_doctores WHERE id_doctor = '$id'";
    $result = mysqli_query($conexion, $query);
    $municipio = mysqli_fetch_row($result);
    $id_municipo = $municipio[0];
?>
<div class="container-fluid sticky-top">
  <div class="row">
    <div class="col m-0 p-0">
      <nav id="navbar_inicio" class="navbar navbar-dark bg-dark bg-gradient text-white px-3">
        <a class="navbar-brand" href="#"><img src="raw/img/escudo.png" width="8%" class="mr-2"><img src="raw/img/secretaria de salud.png" width="18%" class="ml-2"></a>
        <form class="d-flex">
          <span class="fs-5 btn btn-outline-danger rounded-pill" id="btn_salir">salir</span>
        </form>
      </nav>
    </div>
  </div>
</div>
<div class="container">
  <div class="row mt-4 pt-4">
    <div class="col mt-4 pt-4">
      <table class="table table-dark table-hover" id="vacunados">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Vacunado</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT id_usuario, usuario_nombre, usuario_a_paterno, usuario_a_materno, usuario_vacunado FROM t_usuarios WHERE usuario_municipio = '$id_municipo'";
            $result = mysqli_query($conexion, $query);
            while($datos = mysqli_fetch_array($result)){
          ?>
          <tr>
            <th><?php echo $datos['usuario_nombre'];?></th>
            <td><?php echo $datos['usuario_a_paterno'];?></td>
            <td><?php echo $datos['usuario_a_materno'];?></td>
            <td>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" onclick="accion(<?php echo $datos['id_usuario'];?>,`<?php echo $datos['usuario_vacunado'];?>`)" <?php if($datos['usuario_vacunado']==1){?> checked <?php }?>>
              </div>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="manager/manager_inicio_doctor.js"></script>
<?php
  }else{
    header('location:login_doctor');
  }
?>