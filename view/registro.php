<div class="container-fluid sticky-top">
  <div class="row">
    <div class="col m-0 p-0">
      <nav id="navbar_inicio" class="navbar navbar-dark bg-secondary bg-gradient text-white px-3">
        <a class="navbar-brand" href="#"><img src="raw/img/escudo.png" width="8%" class="mr-2"><img src="raw/img/secretaria de salud.png" width="18%" class="ml-2"></a>
      </nav>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center align-items-center mt-4 pt-4">
    <div class="col-sm-12 align-self-center mt-4 pt-4">
      <form class="row g-3 p-2 border border-primary rounded-3" id="frm_registro" name="frm_registro" novalidate>
        <div class="row">
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-4">
                <label for="registro_nombre" class="form-label ">Nombre</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_nombre" name="registro_nombre" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Nombre
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_a_paterno" class="form-label ">Apellido paterno</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_a_paterno" name="registro_a_paterno" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Apellido paterno
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_a_materno" class="form-label ">Apellido materno</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_a_materno" name="registro_a_materno" required>
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
                  <input type="date" class="form-control rounded-start rounded-pill" id="registro_fecha" name="registro_fecha" min="1921-07-15" max="2003-07-15" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Fecha de nacimiento
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <label for="registro_sexo" class="form-label ">Sexo</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-transgender-alt"></i></span>
                  <select class="form-control rounded-start rounded-pill" id="registro_sexo" name="registro_sexo" required>
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
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_curp" name="registro_curp" onblur="cambiarAMayuscula(this)" required>
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
                  <select class="form-control rounded-start rounded-pill" id="registro_estado" name="registro_estado" required>
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
                  <select disabled class="form-control rounded-start rounded-pill" id="registro_municipio" name="registro_municipio" required>
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
                  <select disabled class="form-control rounded-start rounded-pill" id="registro_colonia" name="registro_colonia" required>
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
                  <input type="text" class="form-control rounded-start rounded-pill" id="registro_direccion" name="registro_direccion" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Direccion
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label for="registro_cp" class="form-label ">Codigo postal</label>
                <div class="input-group mb-2">
                  <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-map-marked-alt"></i></span>
                  <input disabled type="text" class="form-control rounded-start rounded-pill" id="registro_cp" name="registro_cp" required>
                  <div class="invalid-feedback">
                    Falta que coloques tu Codigo postal
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="registro_correo" class="form-label ">Correo electronico</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-at"></i></span>
              <input type="email" class="form-control rounded-start rounded-pill" id="registro_correo" name="registro_correo" required>
              <div class="invalid-feedback">
                Falta que coloques tu Correo electronico ó Tu Correo debe de ser gmail, hotmail, live, outlook
              </div>
            </div>
            <label for="registro_confir_correo" class="form-label ">Confirmar correo electronico</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-at"></i></span>
              <input type="email" class="form-control rounded-start rounded-pill" id="registro_confir_correo" name="registro_confir_correo" required>
              <div class="invalid-feedback" id="texto_correo">
                Falta que coloques tu Correo electronico  ó Tu Correo no es el mismo
              </div>
            </div>
            <label for="registro_pass" class="form-label">Contraseña</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-key"></i></span>
              <input type="password" class="form-control rounded-start rounded-pill" id="registro_pass" name="registro_pass" required>
              <div class="invalid-feedback">
                Falta que coloques tu Contraseña
              </div>
            </div>
            <label for="registro_confir_pass" class="form-label">Confirmar contraseña</label>
            <div class="input-group mb-2">
              <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-key"></i></span>
              <input type="password" class="form-control rounded-start rounded-pill" id="registro_confir_pass" name="registro_confir_pass" required>
              <div class="invalid-feedback" id="texto_pass">
                Falta que coloques tu Contraseña ó Tu Contraseña no es la misma
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-end align-items-end">
          <div class="text-end">
            <a href="login" class="link-secondary">Login</a>
          </div>
        </div>
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-4 d-grid">
            <span class="btn btn-primary rounded-pill" id="btn_registro" name="btn_registro">Entrar</span>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="manager/manager_registro.js"></script>