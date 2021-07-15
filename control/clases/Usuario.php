<?php
  require_once "../app/Conexion.php";
  class Usuario extends Conexion{

    public function estados(){
      $conexion = Conexion::conectar();
      $query = "SELECT id_estado, estado FROM t_estados LIMIT 12";
      $result = mysqli_query($conexion, $query);
      $lista = '<option value="">Estado</option>';
      while($estado = mysqli_fetch_array($result)){
        $lista .= "<option value='$estado[id_estado]'>$estado[estado]</option>";
      }
      return $lista;
    }

    public function municipio($id_estado){
      $conexion = Conexion::conectar();
      $query = "SELECT id_municipio, municipio FROM t_municipios WHERE id_estado = '$id_estado'";
      $result = mysqli_query($conexion, $query);
      $lista = '<option value="">Municipio</option>';
      while($municipio = mysqli_fetch_array($result)){
        $lista .= "<option value='$municipio[id_municipio]'>$municipio[municipio]</option>";
      }
      return $lista;
    }

    public function colonia($id_municipio){
      $conexion = Conexion::conectar();
      $query = "SELECT id_colonia, colonia FROM t_colonias WHERE id_municipio = '$id_municipio'";
      $result = mysqli_query($conexion, $query);
      $lista = '<option value="">Colonia</option>';
      while($colonia = mysqli_fetch_array($result)){
        $lista .= "<option value='$colonia[id_colonia]'>$colonia[colonia]</option>";
      }
      return $lista;
    }

    public function codigoPostal($id_colonia){
      $conexion = Conexion::conectar();
      $query = "SELECT codigo_postal FROM t_colonias WHERE id_colonia = '$id_colonia'";
      $result = mysqli_query($conexion, $query);
      $codigoPostal = mysqli_fetch_array($result);
      return $codigoPostal['codigo_postal'];
    }

    public function registro($datos){
      $conexion = Conexion::conectar();
      $vacunado = 0;
      if(Usuario::email($datos['correo'])){
        return 2;
      }else if(Usuario::curp($datos['curp'])){
        return 3;
      }else{
        $query = "INSERT INTO t_usuarios (usuario_nombre,
                                          usuario_a_paterno,
                                          usuario_a_materno,
                                          usuario_nacimiento,
                                          usuario_sexo,
                                          usuario_curp,
                                          usuario_estado,
                                          usuario_municipio,
                                          usuario_colonia,
                                          usuario_direccion,
                                          usuario_cp,
                                          usuario_correo,
                                          usuario_pass,
                                          usuario_vacunado)
                    VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $conexion->prepare($query);
        $sql->bind_param('sssssssssssssi', $datos["nombre"],
                                            $datos["apaterno"],
                                            $datos["amaterno"],
                                            $datos["fecha"],
                                            $datos["sexo"],
                                            $datos["curp"],
                                            $datos["estado"],
                                            $datos["municipio"],
                                            $datos["colonia"],
                                            $datos["direccion"],
                                            $datos["codigopostal"],
                                            $datos["correo"],
                                            $datos["pass"],
                                            $vacunado);
        $result = $sql->execute();
        $sql->close();
        return $result;
      }
    }

    public function email($email){
      $conexion = Conexion::conectar();
      $query = "SELECT usuario_correo FROM t_usuarios WHERE usuario_correo = '$email'";
      $result = mysqli_query($conexion, $query);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $email) {
        return 1;
      }else{
        return 0;
      }
    }

    public function curp($curp){
      $conexion = Conexion::conectar();
      $query = "SELECT usuario_curp FROM t_usuarios WHERE usuario_curp = '$curp'";
      $result = mysqli_query($conexion, $query);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $curp) {
        return 1;
      }else{
        return 0;
      }
    }

    public function login($usuario, $pass){
      session_start();
      $conexion = Conexion::conectar();
      $query = "SELECT count(*) AS loEncontre FROM t_usuarios WHERE usuario_correo = '$usuario' AND usuario_pass = '$pass'";
      $result = mysqli_query($conexion, $query);
      $respuesta = mysqli_fetch_array($result)['loEncontre'];
      if($respuesta > 0){
        $_SESSION['usuario'] = $usuario;
        $query = "SELECT id_usuario FROM t_usuarios WHERE usuario_correo = '$usuario' AND usuario_pass = '$pass'";
        $result = mysqli_query($conexion, $query);
        $id_usuario = mysqli_fetch_row($result)[0];
        $_SESSION['id_usuario'] = $id_usuario;
        return 1; 
      }else{
        return 0;
      }
    }

    public function obtenerDatos($id_usuario){
      $conexion = Conexion::conectar();
      $query = "SELECT usuario_nombre,
                      usuario_a_paterno,
                      usuario_a_materno,
                      usuario_nacimiento,
                      usuario_sexo,
                      usuario_curp,
                      usuario_estado,
                      usuario_municipio,
                      usuario_colonia,
                      usuario_direccion,
                      usuario_cp
                FROM t_usuarios WHERE id_usuario = '$id_usuario'";
      $result = mysqli_query($conexion, $query);
      $dato = mysqli_fetch_array($result);
      $datos = array(
        "nombre" => $dato["usuario_nombre"],
        "apaterno" => $dato["usuario_a_paterno"],
        "amaterno" => $dato["usuario_a_materno"],
        "fecha" => $dato["usuario_nacimiento"],
        "sexo" => $dato["usuario_sexo"],
        "curp" => $dato["usuario_curp"],
        "estado" => $dato["usuario_estado"],
        "municipio" => $dato["usuario_municipio"],
        "colonia" => $dato["usuario_colonia"],
        "direccion" => $dato["usuario_direccion"],
        "codigopostal" => $dato["usuario_cp"]
      );
      return json_encode($datos);
    }

    public function actualizar($datos){
      $conexion = Conexion::conectar();
      $id_usuario = $datos["id_usuario"];
      $query = "UPDATE t_usuarios SET usuario_nombre = ?,
                                      usuario_a_paterno = ?,
                                      usuario_a_materno = ?,
                                      usuario_nacimiento = ?,
                                      usuario_sexo = ?,
                                      usuario_curp = ?,
                                      usuario_estado = ?,
                                      usuario_municipio = ?,
                                      usuario_colonia = ?,
                                      usuario_direccion = ?,
                                      usuario_cp = ?
                            WHERE id_usuario = '$id_usuario'";
      $sql = $conexion->prepare($query);
      $sql->bind_param("sssssssssss", $datos["nombre"],
                                      $datos["apaterno"],
                                      $datos["amaterno"],
                                      $datos["fecha"],
                                      $datos["sexo"],
                                      $datos["curp"],
                                      $datos["estado"],
                                      $datos["municipio"],
                                      $datos["colonia"],
                                      $datos["direccion"],
                                      $datos["codigopostal"]);
      $sql->execute();
      $conexion->close();
      if($sql){
        return 1;
      }else{
        return 0;
      }
    }

  }
?>