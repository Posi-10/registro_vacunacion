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
    <div class="col-sm-4 align-self-center mt-4 pt-4">
      <form class="row g-3 p-2 border border-dark rounded-3" id="frm_login_doctor" name="frm_login_doctor" novalidate>
        <label for="login_doctor_correo" class="form-label ">Correo electronico</label>
        <div class="input-group mb-2">
          <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-at"></i></span>
          <input type="email" class="form-control rounded-start rounded-pill" id="login_doctor_correo" name="login_doctor_correo" required>
          <div class="invalid-feedback">
            Falta que coloques tu Correo electronico ó Tu Correo debe de ser gmail, hotmail, live, outlook
          </div>
        </div>
        <label for="login_doctor_pass" class="form-label">Contraseña</label>
        <div class="input-group mb-2">
          <span class="input-group-text rounded-end rounded-pill" id="addon-wrapping"><i class="fas fa-key"></i></span>
          <input type="password" class="form-control rounded-start rounded-pill" id="login_doctor_pass" name="login_doctor_pass" required>
        </div>
        <div class="text-end">
          <a href="registro_doctor" class="link-secondary">Registro</a>
        </div>
        <span class="btn btn-outline-dark rounded-pill" id="btn_login" name="btn_login" >Entrar</span>
      </form>
    </div>
  </div>
</div>
<script src="manager/manager_login_doctor.js"></script>