<?php
  require_once '../app/Conexion.php';
  class Doctor extends Conexion{
    public function registro($datos){
      $conexion = Conexion::conectar();
      if(Doctor::email($datos['correo'])){
        return 2;
      }else if(Doctor::cedula($datos['cedula'])){
        return 3;
      }else{
        $query = "INSERT INTO t_doctores (doctor_nombre,
                                          doctor_a_paterno,
                                          doctor_a_materno,
                                          doctor_sexo,
                                          doctor_hospital,
                                          doctor_cedula,
                                          doctor_estado,
                                          doctor_municipio,
                                          doctor_colonia,
                                          doctor_direccion,
                                          doctor_cp,
                                          doctor_correo,
                                          doctor_pass)
                    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($query);
        $sql->bind_param('sssssssssssss', $datos["nombre"],
                                            $datos["apaterno"],
                                            $datos["amaterno"],
                                            $datos["sexo"],
                                            $datos["hospital"],
                                            $datos["cedula"],
                                            $datos["estado"],
                                            $datos["municipio"],
                                            $datos["colonia"],
                                            $datos["direccion"],
                                            $datos["codigopostal"],
                                            $datos["correo"],
                                            $datos["pass"]);
        $result = $sql->execute();
        $sql->close();
        return $result;
      }
    }

    public function email($email){
      $conexion = Conexion::conectar();
      $query = "SELECT doctor_correo FROM t_doctores WHERE doctor_correo = '$email'";
      $result = mysqli_query($conexion, $query);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $email) {
        return 1;
      }else{
        return 0;
      }
    }

    public function cedula($cedula){
      $conexion = Conexion::conectar();
      $query = "SELECT doctor_cedula FROM t_doctores WHERE doctor_cedula = '$cedula'";
      $result = mysqli_query($conexion, $query);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $cedula) {
        return 1;
      }else{
        return 0;
      }
    }

    public function login($usuario, $pass){
      session_start();
      $conexion = Conexion::conectar();
      $query = "SELECT count(*) AS loEncontre FROM t_doctores WHERE doctor_correo = '$usuario' AND doctor_pass = '$pass'";
      $result = mysqli_query($conexion, $query);
      $respuesta = mysqli_fetch_array($result)['loEncontre'];
      if($respuesta > 0){
        $_SESSION['doctor'] = $usuario;
        $query = "SELECT id_doctor FROM t_doctores WHERE doctor_correo = '$usuario' AND doctor_pass = '$pass'";
        $result = mysqli_query($conexion, $query);
        $id_doctor = mysqli_fetch_row($result)[0];
        $_SESSION['id_doctor'] = $id_doctor;
        return 1; 
      }else{
        return 0;
      }
    }

    public function vacunado($id, $vacunado){
      $conexion = Conexion::conectar();
      if($vacunado == 0){
        $vacunado = 1;
        $query = "UPDATE t_usuarios SET usuario_vacunado = ? WHERE id_usuario = '$id'";
        $sql = $conexion->prepare($query);
        $sql->bind_param("i", $vacunado);
        $sql->execute();
        $conexion->close();
        if($sql){
          return 1;
        }else{
          return 0;
        }
      }else{
        $vacunado = 0;
        $query = "UPDATE t_usuarios SET usuario_vacunado = ? WHERE id_usuario = '$id'";
        $sql = $conexion->prepare($query);
        $sql->bind_param("i", $vacunado);
        $sql->execute();
        $conexion->close();
        if($sql){
          return 1;
        }else{
          return 0;
        }
      }
    }

  }
?>