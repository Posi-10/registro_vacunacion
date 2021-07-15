<?php
  session_start();
  if(isset($_SESSION['id_usuario'])){
?>
<div class="container-fluid sticky-top">
  <div class="row">
    <div class="col m-0 p-0">
      <nav id="navbar_inicio" class="navbar navbar-dark bg-success bg-gradient text-white px-3">
        <a class="navbar-brand" href="#"><img src="raw/img/escudo.png" width="8%" class="mr-2"><img src="raw/img/secretaria de salud.png" width="18%" class="ml-2"></a>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="fs-5 nav-link link-light" href="#datos">Datos</a>
          </li>
          <li class="nav-item">
            <a class="fs-5 nav-link link-light" href="#documentos">Documentos</a>
          </li>
          <li class="nav-item">
            <span class="fs-5 btn btn-outline-danger rounded-pill" id="btn_salir">salir</span>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<div class="container-sm mt-5">
  <div class="row justify-content-center">
    <div class="col-sm-10">
      <div data-bs-spy="scroll" data-bs-target="#navbar_inicio" data-bs-offset="0" class="scrollspy-example" tabindex="0">
        <div class="row justify-content-center">
          <div class="col-sm-10">
            <h4 id="datos">Datos</h4>
            <form class="row g-3 p-2 border border-primary rounded-3 mt-3" id="frm_registro" name="frm_datos" novalidate>
              <div class="row">
                <div class="col">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="activar_actualizacion">
                    <label class="form-check-label" for="activar_actualizacion">Desea Actualizar sus datos</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="registro_nombre" class="form-label ">Nombre</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_nombre" name="datos_nombre" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Nombre
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="registro_a_paterno" class="form-label ">Apellido paterno</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_a_paterno" name="datos_a_paterno" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Apellido paterno
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="registro_a_materno" class="form-label ">Apellido materno</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_a_materno" name="datos_a_materno" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Apellido materno
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="registro_fecha" class="form-label ">Fecha de nacimiento</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-calendar-alt"></i></span>
                        <input disabled type="date" class="form-control rounded-start rounded-pill" id="datos_fecha" name="datos_fecha" min="1921-07-15" max="2003-07-15" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Fecha de nacimiento
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label for="registro_sexo" class="form-label ">Sexo</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-transgender-alt"></i></span>
                        <select disabled class="form-control rounded-start rounded-pill" id="datos_sexo" name="datos_sexo" required>
                          <option value="">Sexo</option>
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                          <option value="Otro">Otro</option>
                        </select>
                        <div class="invalid-feedback">
                          Falta que selecciones tu Sexo
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <label for="registro_curp" class="form-label ">CURP</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-id-badge"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_curp" name="datos_curp" onblur="cambiarAMayuscula(this)" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu CURP
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="registro_estado" class="form-label ">Estado</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                        <select disabled class="form-control rounded-start rounded-pill" id="datos_estado" name="datos_estado" required>
                        </select>
                        <div class="invalid-feedback">
                          Falta que selecciones tu Estado
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="registro_municipio" class="form-label ">Municipio</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                        <select disabled class="form-control rounded-start rounded-pill" id="datos_municipio" name="datos_municipio" required>
                          <option value="">Municipio</option>
                        </select>
                        <div class="invalid-feedback">
                          Falta que selecciones tu Municipio
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="registro_colonia" class="form-label ">Colonia</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                        <select disabled class="form-control rounded-start rounded-pill" id="datos_colonia" name="datos_colonia" required>
                          <option value="">Colonia</option>
                        </select>
                        <div class="invalid-feedback">
                          Falta que selecciones tu Colonia
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <label for="registro_direccion" class="form-label ">Direccion</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marker-alt"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_direccion" name="datos_direccion" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Direccion
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="registro_cp" class="form-label ">Codigo postal</label>
                      <div class="input-group mb-2">
                        <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                        <input disabled type="text" class="form-control rounded-start rounded-pill" id="datos_cp" name="datos_cp" required>
                        <div class="invalid-feedback">
                          Falta que coloques tu Codigo postal
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center align-items-center">
                <div class="col-sm-4 d-grid">
                  <span class="btn btn-primary rounded-pill" id="btn_actualizar" name="btn_actualizar" hidden>Actualizar</span>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col-sm-10">
            <h4 id="documentos">Documento</h4>
            <div class="text-center">
              <iframe src="raw/archivo/Vacunacion.pdf" width="100%" height="400vh"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="manager\manager_inicio.js"></script>
<?php
  }else{
    header('location:login');
  }
?>