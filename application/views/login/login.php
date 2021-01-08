<!doctype html>
<html lang="en">
  <!-- ========== HEAD ========== -->
  <?=$this->load->view('includes/head','',TRUE)?>
  <!-- ========== /HEAD ========== -->
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
            Sign in
          </h1>
          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
            Free access to our dashboard.
          </p>
          <!-- Form -->
          <?=form_open('log/in')?>
            <!-- ========== Alertas ========== -->
            <?=$this->alertas->get()?>
            <!-- ========== /Alertas ========== -->
            <!-- Email address -->
            <div class="form-group">
              <label>Correo electrónico</label>
              <input type="email" class="form-control" name="correo">
              <?=form_error('correo')?>
            </div>
            <div class="form-group">
              <label>Contraseña</label>
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <input type="password" class="form-control form-control-appended" name="password">
                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>
              </div>
              <?=form_error('password')?>
            </div>
            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Inicias sesión
            </button>
            <!-- Link -->
            <p class="text-center">
              <small class="text-muted text-center">
                Don't have an account yet? <a href="sign-up-cover.html">Sign up</a>.
              </small>
            </p>
          <?=form_close()?>
        </div>
      </div> <!-- / .row -->
    </div>
    <!-- ========== Base JS ========== -->
    <?=$this->load->view('includes/base_js','',TRUE)?>
    <!-- ========== /Base JS ========== -->
  </body>
</html>