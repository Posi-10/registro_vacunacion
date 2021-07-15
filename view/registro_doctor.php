<div class="container-fluid sticky-top">
  <div class="row">
    <div class="col m-0 p-0">
      <nav id="navbar_inicio" class="navbar navbar-dark bg-dark bg-gradient text-white px-3">
        <a class="navbar-brand" href="#"><img src="raw/img/escudo.png" width="8%" class="mr-2"><img src="raw/img/secretaria de salud.png" width="18%" class="ml-2"></a>
      </nav>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center align-items-center mt-4 pt-4">
    <div class="col-sm-12 align-self-center mt-4 pt-4">
      <form class="row g-3 p-2 border border-dark rounded-3" id="frm_registro_doctor" name="frm_registro_doctor" novalidate>
        <div class="row">
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-4">
                <label for="registro_doctor_nombre" class="form-label ">Nombre</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_nombre" name="registro_doctor_nombre" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Nombre
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_doctor_a_paterno" class="form-label ">Apellido paterno</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_a_paterno" name="registro_doctor_a_paterno" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Apellido paterno
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_doctor_a_materno" class="form-label ">Apellido materno</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_a_materno" name="registro_doctor_a_materno" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Apellido materno
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="registro_doctor_sexo" class="form-label ">Sexo</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-transgender-alt"></i></span>
                  <select class="form-control rounded-start rounded-pill" id="registro_doctor_sexo" name="registro_doctor_sexo" required>
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
              <div class="col-sm-4">
                <label for="registro_doctor_hospital" class="form-label ">Hospital</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-hospital-alt"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_hospital" name="registro_doctor_hospital" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Fecha de nacimiento
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <label for="registro_doctor_cedula" class="form-label ">N° de celuda</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-id-badge"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_cedula" name="registro_doctor_cedula" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu CURP
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <label for="registro_doctor_estado" class="form-label ">Estado</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <select class="form-control rounded-start rounded-pill" id="registro_doctor_estado" name="registro_doctor_estado" required>
                  </select>
                  <div class="invalid-feedback">
                    Falta que selecciones tu Estado
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_doctor_municipio" class="form-label ">Municipio</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <select disabled class="form-control rounded-start rounded-pill" id="registro_doctor_municipio" name="registro_doctor_municipio" required>
                    <option value="">Municipio</option>
                  </select>
                  <div class="invalid-feedback">
                    Falta que selecciones tu Municipio
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_doctor_colonia" class="form-label ">Colonia</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <select disabled class="form-control rounded-start rounded-pill" id="registro_doctor_colonia" name="registro_doctor_colonia" required>
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
                <label for="registro_doctor_direccion" class="form-label ">Direccion</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_direccion" name="registro_doctor_direccion" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Direccion
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_doctor_cp" class="form-label ">Codigo postal</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <input disabled type="text" class="form-control rounded-start rounded-pill" id="registro_doctor_cp" name="registro_doctor_cp" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Codigo postal
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="registro_doctor_correo" class="form-label ">Correo electronico</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-at"></i></span>
              <input type="email" class="form-control rounded-start rounded-pill" id="registro_doctor_correo" name="registro_doctor_correo" required>
              <div class="invalid-feedback">
                Falta que coloques tu Correo electronico ó Tu Correo debe de ser gmail, hotmail, live, outlook
              </div>
            </div>
            <label for="registro_doctor_confir_correo" class="form-label ">Confirmar correo electronico</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-at"></i></span>
              <input type="email" class="form-control rounded-start rounded-pill" id="registro_doctor_confir_correo" name="registro_doctor_confir_correo" required>
              <div class="invalid-feedback" id="texto_correo">
                Falta que coloques tu Correo electronico  ó Tu Correo no es el mismo
              </div>
            </div>
            <label for="registro_doctor_pass" class="form-label">Contraseña</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-key"></i></span>
              <input type="password" class="form-control rounded-start rounded-pill" id="registro_doctor_pass" name="registro_doctor_pass" required>
              <div class="invalid-feedback">
                Falta que coloques tu Contraseña
              </div>
            </div>
            <label for="registro_doctor_confir_pass" class="form-label">Confirmar contraseña</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-key"></i></span>
              <input type="password" class="form-control rounded-start rounded-pill" id="registro_doctor_confir_pass" name="registro_doctor_confir_pass" required>
              <div class="invalid-feedback" id="texto_pass">
                Falta que coloques tu Contraseña ó Tu Contraseña no es la misma
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-end align-items-end">
          <div class="text-end">
            <a href="login_doctor" class="link-secondary">Login</a>
          </div>
        </div>
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-4 d-grid">
            <span class="btn btn-outline-dark rounded-pill" id="btn_registro" name="btn_registro">Entrar</span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="manager/manager_registro_doctor.js"></script>